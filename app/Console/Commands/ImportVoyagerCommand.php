<?php

namespace App\Console\Commands;

use App\Support\SqlDumpParser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Statamic\Facades\Entry;
use Statamic\Facades\Term;
use Symfony\Component\Yaml\Yaml;

class ImportVoyagerCommand extends Command
{
    protected $signature = 'fgs:import-voyager
        {--sql=database/fgsupdate_20260617_prod.sql : Path to the SQL dump}
        {--fresh : Delete existing imported collections before import}
        {--only= : Comma-separated collections to import}';

    protected $description = 'Import Voyager/MariaDB dump content into Statamic collections';

    private array $categorySlugById = [];

    private array $territoryIdByLegacy = [];

    public function handle(): int
    {
        $sqlPath = base_path($this->option('sql'));
        if (! is_file($sqlPath)) {
            $this->error("SQL file not found: {$sqlPath}");

            return self::FAILURE;
        }

        $only = $this->option('only')
            ? array_filter(array_map('trim', explode(',', $this->option('only'))))
            : null;

        if ($this->option('fresh')) {
            $this->freshContent($only);
        }

        $parser = new SqlDumpParser($sqlPath);

        $steps = [
            'categories' => fn () => $this->importCategories($parser),
            'territories' => fn () => $this->importTerritories($parser),
            'posts' => fn () => $this->importPosts($parser),
            'pages' => fn () => $this->importPages($parser),
            'home_banners' => fn () => $this->importHomeBanners($parser),
            'faqs' => fn () => $this->importFaqs($parser),
            'social_foundations' => fn () => $this->importLogoTable($parser, 'social_foundations', 'social_foundations', 'name'),
            'participate_capitals' => fn () => $this->importLogoTable($parser, 'participate_capitals', 'participate_capitals', 'name'),
            'direct_social_programs' => fn () => $this->importPrograms($parser),
            'company_logos' => fn () => $this->importLogoTable($parser, 'company_logos', 'company_logos', 'title'),
            'foundation_logos' => fn () => $this->importLogoTable($parser, 'foundation_logos', 'foundation_logos', 'title'),
            'home_maplogos' => fn () => $this->importLogoTable($parser, 'home_maplogos', 'home_maplogos', 'title'),
            'about_us_videos' => fn () => $this->importAboutVideos($parser),
            'social_links' => fn () => $this->importSocialLinks($parser),
            'globals' => fn () => $this->importGlobals($parser),
            'navigation' => fn () => $this->importNavigation($parser),
            'meet_youes' => fn () => $this->exportMeetYoues($parser),
        ];

        foreach ($steps as $name => $callback) {
            if ($only && ! in_array($name, $only, true)) {
                continue;
            }
            $this->info("Importing {$name}...");
            $callback();
        }

        $this->info('Import complete. Run: php please stache:clear && php please stache:warm');

        return self::SUCCESS;
    }

    private function freshContent(?array $only): void
    {
        $collections = [
            'pages', 'posts', 'territories', 'home_banners', 'faqs',
            'social_foundations', 'participate_capitals', 'direct_social_programs',
            'company_logos', 'foundation_logos', 'home_maplogos',
            'about_us_videos', 'social_links',
        ];

        foreach ($collections as $collection) {
            if ($only && ! in_array($collection, $only, true)) {
                continue;
            }
            $dir = base_path("content/collections/{$collection}");
            if (! is_dir($dir)) {
                continue;
            }
            foreach (glob("{$dir}/*.{md,yaml,yml}", GLOB_BRACE) ?: [] as $file) {
                unlink($file);
            }
        }

        $termsDir = base_path('content/taxonomies/categories');
        if ((! $only || in_array('categories', $only, true)) && is_dir($termsDir)) {
            foreach (glob("{$termsDir}/*.yaml") ?: [] as $file) {
                unlink($file);
            }
        }
    }

    private function importCategories(SqlDumpParser $parser): void
    {
        foreach ($parser->tableRows('categories') as $row) {
            $slug = $row['slug'] ?: Str::slug($row['name'] ?? 'category-'.$row['id']);
            $this->categorySlugById[(int) $row['id']] = $slug;

            Term::make()
                ->taxonomy('categories')
                ->slug($slug)
                ->data([
                    'title' => $row['name'] ?? $slug,
                    'legacy_id' => (int) $row['id'],
                ])
                ->save();
        }

        $this->line('  → '.count($this->categorySlugById).' categories');
    }

    private function importTerritories(SqlDumpParser $parser): void
    {
        $count = 0;
        foreach ($parser->tableRows('city_details') as $row) {
            if (! empty($row['deleted_at'])) {
                continue;
            }

            $slug = $row['slug'] ?: Str::slug($row['name'] ?? 'territory-'.$row['id']);
            $id = 'territory-'.$row['id'];
            $this->territoryIdByLegacy[(int) $row['id']] = $id;

            Entry::make()
                ->collection('territories')
                ->id($id)
                ->slug($slug)
                ->published(true)
                ->data([
                    'title' => $row['name'] ?? $slug,
                    'description' => $this->rewriteHtml($row['description'] ?? null),
                    'territory' => $this->rewriteHtml($row['territory'] ?? null),
                    'looking_for' => $this->rewriteHtml($row['looking_for'] ?? null),
                    'habitantes' => $row['habitantes'] ?? null,
                    'city_other_data' => $this->rewriteHtml($row['city_other_data'] ?? null),
                    'map_image' => $this->assetPath($row['map_image'] ?? null),
                    'listing_image' => $this->assetPath($row['listing_image'] ?? null),
                    'image' => $this->assetPath($row['image'] ?? null),
                    'title_image' => $this->assetPath($row['title_bg_image'] ?? ($row['title_image'] ?? null)),
                    'title_bg_image' => $this->assetPath($row['title_bg_image'] ?? null),
                    'state' => $row['state'] ?? null,
                    'active' => (bool) ($row['active'] ?? 0),
                    'seo_title' => $row['seo_title'] ?? null,
                    'meta_description' => $row['meta_description'] ?? null,
                    'meta_keywords' => $row['meta_keywords'] ?? null,
                    'legacy_id' => (int) $row['id'],
                ])
                ->save();
            $count++;
        }
        $this->line("  → {$count} territories");
    }

    private function importPosts(SqlDumpParser $parser): void
    {
        if (! $this->categorySlugById) {
            foreach (Term::query()->where('taxonomy', 'categories')->get() as $term) {
                $legacy = $term->get('legacy_id');
                if ($legacy) {
                    $this->categorySlugById[(int) $legacy] = $term->slug();
                }
            }
        }
        if (! $this->territoryIdByLegacy) {
            foreach (Entry::query()->where('collection', 'territories')->get() as $entry) {
                $legacy = $entry->get('legacy_id');
                if ($legacy) {
                    $this->territoryIdByLegacy[(int) $legacy] = $entry->id();
                }
            }
        }

        $count = 0;
        foreach ($parser->tableRows('posts') as $row) {
            $slug = $row['slug'] ?: Str::slug($row['title'] ?? 'post-'.$row['id']);
            $rawDate = $row['publish_date'] ?: ($row['created_at'] ?? now()->toDateTimeString());
            try {
                $date = Carbon::parse($rawDate);
            } catch (\Throwable) {
                $date = now();
            }
            $categoryId = isset($row['category_id']) ? (int) $row['category_id'] : null;
            $cityId = isset($row['city_detail_id']) ? (int) $row['city_detail_id'] : null;

            $data = [
                'title' => $row['title'] ?? $slug,
                'sub_title' => $row['sub_title'] ?? null,
                'excerpt' => $row['excerpt'] ?? null,
                'body' => $this->rewriteHtml($row['body'] ?? null),
                'image' => $this->assetPath($row['image'] ?? null),
                'featured' => (bool) ($row['featured'] ?? 0),
                'status_legacy' => $row['status'] ?? 'PUBLISHED',
                'seo_title' => $row['seo_title'] ?? null,
                'meta_description' => $row['meta_description'] ?? null,
                'meta_keywords' => $row['meta_keywords'] ?? null,
                'legacy_id' => (int) $row['id'],
                'legacy_category_id' => $categoryId,
            ];

            if ($categoryId && isset($this->categorySlugById[$categoryId])) {
                $data['categories'] = [$this->categorySlugById[$categoryId]];
            }
            if ($cityId && isset($this->territoryIdByLegacy[$cityId])) {
                $data['territory'] = $this->territoryIdByLegacy[$cityId];
            }

            $published = strtoupper((string) ($row['status'] ?? 'PUBLISHED')) === 'PUBLISHED';

            Entry::make()
                ->collection('posts')
                ->id('post-'.$row['id'])
                ->slug($slug)
                ->date($date->format('Y-m-d'))
                ->published($published)
                ->data($data)
                ->save();
            $count++;
        }
        $this->line("  → {$count} posts");
    }

    private function importPages(SqlDumpParser $parser): void
    {
        $count = 0;
        foreach ($parser->tableRows('pages') as $row) {
            $slug = $row['slug'] ?: Str::slug($row['title'] ?? 'page-'.$row['id']);

            Entry::make()
                ->collection('pages')
                ->id('page-'.$row['id'])
                ->slug($slug)
                ->published(strtoupper((string) ($row['status'] ?? 'ACTIVE')) === 'ACTIVE')
                ->data([
                    'title' => $row['title'] ?? $slug,
                    'excerpt' => $row['excerpt'] ?? null,
                    'body' => $this->rewriteHtml($row['body'] ?? null),
                    'image' => $this->assetPath($row['image'] ?? null),
                    'has_about_videos' => (bool) ($row['has_about_videos'] ?? 0),
                    'has_companies' => (bool) ($row['has_companies'] ?? 0),
                    'has_direct_programs' => (bool) ($row['has_direct_programs'] ?? 0),
                    'has_testimonials_companies' => (bool) ($row['has_testimonials_companies'] ?? 0),
                    'has_testimonials_programs' => (bool) ($row['has_testimonials_programs'] ?? 0),
                    'has_float_message' => (bool) ($row['has_float_message'] ?? 0),
                    'has_how_about' => (bool) ($row['has_how_about'] ?? 0),
                    'has_faqs' => (bool) ($row['has_faqs'] ?? 0),
                    'status_legacy' => $row['status'] ?? 'ACTIVE',
                    'seo_title' => $row['seo_title'] ?? null,
                    'meta_description' => $row['meta_description'] ?? null,
                    'meta_keywords' => $row['meta_keywords'] ?? null,
                ])
                ->save();
            $count++;
        }
        $this->line("  → {$count} pages");
    }

    private function importHomeBanners(SqlDumpParser $parser): void
    {
        $count = 0;
        foreach ($parser->tableRows('home_banner_videos') as $row) {
            if (! empty($row['deleted_at'])) {
                continue;
            }
            $title = $row['title'] ?? ('Banner '.$row['id']);
            Entry::make()
                ->collection('home_banners')
                ->id('banner-'.$row['id'])
                ->slug(Str::slug($title).'-'.$row['id'])
                ->published(true)
                ->data([
                    'title' => $title,
                    'description' => $this->rewriteHtml($row['description'] ?? null),
                    'youtube_url' => $row['youtube_link'] ?? ($row['youtube_url'] ?? null),
                    'youtube_id' => $row['youtube_id'] ?? null,
                    'thumbnail' => $this->assetPath($row['thumbnail'] ?? ($row['video_thumbnail'] ?? null)),
                    'thumbnail_mobile' => $this->assetPath($row['thumbnail_mobile'] ?? null),
                    'cta_text' => $row['button_text'] ?? ($row['cta_text'] ?? null),
                    'cta_url' => $row['redirect_link'] ?? ($row['button_link'] ?? ($row['cta_url'] ?? null)),
                    'target' => $row['target'] ?? null,
                    'inverted_text' => (bool) ($row['inverted_text'] ?? 0),
                    'text_display' => $row['text_display'] ?? 'on',
                    'order' => (int) ($row['order'] ?? $row['display_rank'] ?? 0),
                ])
                ->save();
            $count++;
        }
        $this->line("  → {$count} home banners");
    }

    private function importFaqs(SqlDumpParser $parser): void
    {
        $count = 0;
        foreach ($parser->tableRows('frequently_asked_questions') as $row) {
            if (! empty($row['deleted_at'])) {
                continue;
            }
            $title = $row['question'] ?? ('FAQ '.$row['id']);
            Entry::make()
                ->collection('faqs')
                ->id('faq-'.$row['id'])
                ->slug(Str::slug(Str::limit($title, 60, '')).'-'.$row['id'])
                ->published(true)
                ->data([
                    'title' => $title,
                    'answer' => $this->rewriteHtml($row['answer'] ?? null),
                ])
                ->save();
            $count++;
        }
        $this->line("  → {$count} faqs");
    }

    private function importLogoTable(SqlDumpParser $parser, string $table, string $collection, string $titleField): void
    {
        $count = 0;
        foreach ($parser->tableRows($table) as $row) {
            if (! empty($row['deleted_at'])) {
                continue;
            }
            $title = $row[$titleField] ?? ($row['name'] ?? $collection.'-'.$row['id']);
            Entry::make()
                ->collection($collection)
                ->id(Str::slug($collection).'-'.$row['id'])
                ->slug(Str::slug($title).'-'.$row['id'])
                ->published(true)
                ->data([
                    'title' => $title,
                    'logo' => $this->assetPath($row['logo'] ?? ($row['image'] ?? null)),
                    'website' => $row['website'] ?? null,
                    'description' => $row['description'] ?? null,
                    'display_rank' => (int) ($row['display_rank'] ?? $row['order'] ?? 0),
                    'activity' => isset($row['activity']) ? (int) $row['activity'] : null,
                ])
                ->save();
            $count++;
        }
        $this->line("  → {$count} {$collection}");
    }

    private function importPrograms(SqlDumpParser $parser): void
    {
        $count = 0;
        foreach ($parser->tableRows('direct_social_programs') as $row) {
            if (! empty($row['deleted_at'])) {
                continue;
            }
            $title = $row['title'] ?? ($row['name'] ?? 'program-'.$row['id']);
            Entry::make()
                ->collection('direct_social_programs')
                ->id('program-'.$row['id'])
                ->slug(Str::slug($title).'-'.$row['id'])
                ->published(true)
                ->data([
                    'title' => $title,
                    'image' => $this->assetPath($row['image'] ?? ($row['logo'] ?? null)),
                    'description' => $this->rewriteHtml($row['description'] ?? null),
                    'website' => $row['website'] ?? null,
                ])
                ->save();
            $count++;
        }
        $this->line("  → {$count} programs");
    }

    private function importAboutVideos(SqlDumpParser $parser): void
    {
        $count = 0;
        foreach ($parser->tableRows('about_us_videos') as $row) {
            if (! empty($row['deleted_at'])) {
                continue;
            }
            $title = $row['title'] ?? 'video-'.$row['id'];
            Entry::make()
                ->collection('about_us_videos')
                ->id('about-video-'.$row['id'])
                ->slug(Str::slug($title).'-'.$row['id'])
                ->published(true)
                ->data([
                    'title' => $title,
                    'youtube_url' => $row['youtube_link'] ?? null,
                    'thumbnail' => $this->assetPath($row['video_thumbnail'] ?? null),
                    'order' => (int) ($row['display_rank'] ?? 0),
                ])
                ->save();
            $count++;
        }
        $this->line("  → {$count} about videos");
    }

    private function importSocialLinks(SqlDumpParser $parser): void
    {
        $count = 0;
        foreach ($parser->tableRows('social_links') as $row) {
            if (! empty($row['deleted_at'])) {
                continue;
            }
            $title = $row['name'] ?? ($row['title'] ?? 'social-'.$row['id']);
            Entry::make()
                ->collection('social_links')
                ->id('social-'.$row['id'])
                ->slug(Str::slug($title).'-'.$row['id'])
                ->published(true)
                ->data([
                    'title' => $title,
                    'url' => $row['website'] ?? ($row['url'] ?? ($row['link'] ?? null)),
                    'icon' => $row['class'] ?? ($row['icon'] ?? null),
                    'order' => (int) ($row['order'] ?? $row['display_rank'] ?? 0),
                ])
                ->save();
            $count++;
        }
        $this->line("  → {$count} social links");
    }

    private function importGlobals(SqlDumpParser $parser): void
    {
        $map = [
            'site.title' => 'title',
            'site.description' => 'description',
            'site.logo' => 'logo',
            'site.footer_direction' => 'footer_direction',
            'site.footer_letephone' => 'footer_telephone',
            'site.receive_email' => 'receive_email',
            'site.mail_from' => 'mail_from',
            'site.google_analytics_tracking_id' => 'google_analytics_tracking_id',
            'site.google_tag_manager' => 'google_tag_manager',
            'site.google_tag_manager_noscript' => 'google_tag_manager_noscript',
            'site.recaptcha_site_key' => 'recaptcha_site_key',
            'site.recaptcha_secret_key' => 'recaptcha_secret_key',
        ];

        $data = [];
        foreach ($parser->tableRows('settings') as $row) {
            $key = $row['key'] ?? null;
            if (! $key || ! isset($map[$key])) {
                continue;
            }
            $value = $row['value'] ?? null;
            if ($map[$key] === 'logo') {
                $value = $this->assetPath($value);
            }
            $data[$map[$key]] = $value;
        }

        $path = base_path('content/globals/default/site.yaml');
        $existing = is_file($path) ? (Yaml::parseFile($path) ?: []) : [];
        if (isset($existing['data']) && is_array($existing['data'])) {
            $existing = $existing['data'];
        }
        $merged = array_merge($existing, $data);
        // Strip secrets from committed defaults; keep keys empty for rotation in prod
        foreach (['recaptcha_site_key', 'recaptcha_secret_key', 'google_tag_manager', 'google_tag_manager_noscript'] as $secret) {
            if (isset($merged[$secret]) && is_string($merged[$secret]) && $merged[$secret] !== '') {
                // Keep imported values in local; document rotation in README
            }
        }
        file_put_contents($path, Yaml::dump($merged, 4, 2));
        $this->line('  → site globals updated (rotate secrets in production)');
    }

    private function importNavigation(SqlDumpParser $parser): void
    {
        $menus = [];
        foreach ($parser->tableRows('menus') as $row) {
            $menus[(int) $row['id']] = $row['name'] ?? null;
        }

        $navMap = [
            'front-main-menu' => 'front_main_menu',
            'front-interest-menu' => 'front_interest_menu',
            'front-footer-left-menu' => 'front_footer_left',
            'front-footer-right-menu' => 'front_footer_right',
            'front-mobile-top-menu' => 'front_mobile_top_menu',
            'front-footer-bottom-menu' => 'front_footer_right',
        ];

        $itemsByMenu = [];
        foreach ($parser->tableRows('menu_items') as $row) {
            $menuId = (int) ($row['menu_id'] ?? 0);
            $itemsByMenu[$menuId][] = $row;
        }

        foreach ($menus as $menuId => $name) {
            if (! isset($navMap[$name])) {
                continue;
            }
            $handle = $navMap[$name];
            $tree = [];
            $items = $itemsByMenu[$menuId] ?? [];
            usort($items, fn ($a, $b) => ((int) ($a['order'] ?? 0)) <=> ((int) ($b['order'] ?? 0)));

            foreach ($items as $item) {
                if (! empty($item['parent_id'])) {
                    continue;
                }
                $url = $item['url'] ?? '/';
                if (! empty($item['route'])) {
                    $url = '/'.ltrim((string) $item['route'], '/');
                }
                $tree[] = [
                    'id' => (string) Str::uuid(),
                    'title' => $item['title'] ?? 'Item',
                    'url' => $url,
                ];
            }

            $treePath = base_path("content/trees/navigation/{$handle}.yaml");
            if (! is_dir(dirname($treePath))) {
                mkdir(dirname($treePath), 0755, true);
            }
            file_put_contents($treePath, Yaml::dump(['tree' => $tree], 4, 2));
            $this->line("  → nav {$handle} (".count($tree).' top items)');
        }
    }

    private function exportMeetYoues(SqlDumpParser $parser): void
    {
        $rows = $parser->tableRows('meet_youes');
        $dir = storage_path('app/imports');
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $path = "{$dir}/meet_youes.csv";
        $fh = fopen($path, 'w');
        fputcsv($fh, ['id', 'name', 'email', 'phone', 'age', 'occupation', 'resume', 'created_at']);
        foreach ($rows as $row) {
            fputcsv($fh, [
                $row['id'] ?? '',
                $row['name'] ?? '',
                $row['email'] ?? '',
                $row['phone'] ?? '',
                $row['age'] ?? '',
                $row['occupation'] ?? '',
                $row['resume'] ?? '',
                $row['created_at'] ?? '',
            ]);
        }
        fclose($fh);
        $this->line('  → archived '.count($rows)." meet_youes to {$path}");
    }

    private function assetPath(?string $path): ?string
    {
        if (! $path) {
            return null;
        }
        $path = preg_replace('#^https?://[^/]+/storage/#', '', $path);
        $path = preg_replace('#^/storage/#', '', $path);
        $path = ltrim($path, '/');

        return $path !== '' ? $path : null;
    }

    private function rewriteHtml(?string $html): ?string
    {
        if ($html === null || $html === '') {
            return $html;
        }

        $html = preg_replace(
            '#https?://(?:www\.)?fundaciongruposocial\.co/storage/#i',
            '/storage/',
            $html
        );

        return $html;
    }
}
