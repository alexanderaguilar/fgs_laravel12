<?php

namespace App\Support;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Statamic\Entries\Entry as StatamicEntry;
use Statamic\Facades\Entry;
use Statamic\Facades\GlobalSet;
use Statamic\Facades\Nav;
use Statamic\Facades\Search;
use Statamic\Facades\Term;

class Cms
{
    public static function site(string $key, mixed $default = null): mixed
    {
        $set = GlobalSet::findByHandle('site');
        if ($set) {
            $variables = $set->inDefaultSite();
            if ($variables) {
                $value = $variables->get($key);
                if ($value !== null && $value !== '') {
                    return $value;
                }
            }
        }

        // Fallback: read flat YAML if Stache has not hydrated yet
        $path = base_path('content/globals/default/site.yaml');
        if (is_file($path)) {
            $data = \Symfony\Component\Yaml\Yaml::parseFile($path) ?? [];
            if (isset($data['data']) && is_array($data['data'])) {
                $data = $data['data'];
            }

            return $data[$key] ?? $default;
        }

        return $default;
    }

    public static function entries(string $collection, ?callable $configure = null): Collection
    {
        $query = Entry::query()->where('collection', $collection)->whereStatus('published');
        if ($configure) {
            $configure($query);
        }

        return $query->get()->map(fn ($entry) => self::present($entry));
    }

    public static function findBySlug(string $collection, string $slug): ?object
    {
        $entry = Entry::query()
            ->where('collection', $collection)
            ->where('slug', $slug)
            ->whereStatus('published')
            ->first();

        return $entry ? self::present($entry) : null;
    }

    public static function postsByCategorySlug(string $categorySlug, ?int $limit = null): Collection
    {
        $query = Entry::query()
            ->where('collection', 'posts')
            ->whereStatus('published')
            ->whereTaxonomy('categories::'.$categorySlug)
            ->orderBy('date', 'desc');

        if ($limit) {
            $query->limit($limit);
        }

        return $query->get()->map(fn ($entry) => self::present($entry));
    }

    public static function postsForTerritory(string $territoryEntryId, string $categorySlug, int $limit = 4): Collection
    {
        return Entry::query()
            ->where('collection', 'posts')
            ->whereStatus('published')
            ->whereTaxonomy('categories::'.$categorySlug)
            ->where('territory', $territoryEntryId)
            ->orderBy('date', 'desc')
            ->limit($limit)
            ->get()
            ->map(fn ($entry) => self::present($entry));
    }

    public static function paginatePostsByCategory(string $categorySlug, int $perPage = 6): LengthAwarePaginator
    {
        $all = self::postsByCategorySlug($categorySlug);
        $page = max(1, (int) request('page', 1));
        $slice = $all->slice(($page - 1) * $perPage, $perPage)->values();

        return new LengthAwarePaginator(
            $slice,
            $all->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

    /**
     * Flat list of Statamic navigation tree items (title + absolute-path url).
     * Mega-menu “Conócenos” stays in Blade; top-level / footer columns can use this.
     */
    public static function navItems(string $handle, string $site = 'default'): Collection
    {
        $nav = Nav::find($handle);
        if (! $nav) {
            return collect();
        }

        $tree = $nav->in($site);
        if (! $tree) {
            return collect();
        }

        return collect($tree->tree())->map(function (array $item) {
            $url = $item['url'] ?? '#';
            if ($url !== '#' && ! str_starts_with($url, 'http') && ! str_starts_with($url, '/') && ! str_starts_with($url, 'javascript:')) {
                $url = '/'.ltrim($url, '/');
            }

            return (object) [
                'id' => $item['id'] ?? null,
                'title' => $item['title'] ?? '',
                'url' => $url,
                'target' => $item['target'] ?? '_self',
            ];
        })->values();
    }

    public static function search(string $query, int $limit = 50): Collection
    {
        $needle = trim($query);
        if (mb_strlen($needle) < 3) {
            return collect();
        }

        $cacheKey = 'fgs.search.v2.'.md5(mb_strtolower($needle).'|'.$limit);

        return Cache::remember($cacheKey, 30, function () use ($needle, $limit) {
            try {
                $index = Search::index('site');
                $index->ensureExists();

                return $index
                    ->search($needle)
                    ->whereStatus('published')
                    ->limit($limit)
                    ->get()
                    ->map(function ($result) {
                        $entry = $result->getSearchable();
                        if (! $entry instanceof StatamicEntry) {
                            return null;
                        }

                        $collection = $entry->collectionHandle();
                        if (! in_array($collection, ['posts', 'territories'], true)) {
                            return null;
                        }

                        $presented = self::present($entry);
                        $presented->search_type = match ($collection) {
                            'posts' => 'Noticia',
                            'territories' => 'Territorio Progreso',
                            default => 'Contenido',
                        };

                        $excerpt = self::plainText($entry->get('excerpt') ?? '');
                        $answer = self::plainText($entry->get('answer') ?? '');
                        $body = self::plainText($entry->get('body') ?? '');
                        $description = self::plainText($entry->get('description') ?? '');
                        $presented->search_excerpt = Str::limit(
                            trim($excerpt !== '' ? $excerpt : ($answer !== '' ? $answer : ($description !== '' ? $description : $body))),
                            140
                        );

                        return $presented;
                    })
                    ->filter()
                    ->values();
            } catch (\Throwable $e) {
                Log::warning('Site search failed', [
                    'q' => $needle,
                    'message' => $e->getMessage(),
                ]);

                return collect();
            }
        });
    }

    public static function searchSuggest(string $query, int $limit = 8): Collection
    {
        return self::search($query, $limit)->map(fn ($item) => (object) [
            'title' => $item->title,
            'url' => $item->url,
            'type' => $item->search_type ?? 'Contenido',
            'excerpt' => $item->search_excerpt ?? '',
        ]);
    }

    public static function present($entry): object
    {
        $data = $entry->data()->all();
        foreach (['image', 'logo', 'thumbnail', 'thumbnail_mobile', 'listing_image', 'map_image', 'title_image', 'title_bg_image', 'background_image'] as $field) {
            if (array_key_exists($field, $data)) {
                $data[$field] = self::assetToPath($data[$field]);
            }
        }

        $date = $entry->date() ? \Carbon\Carbon::parse($entry->date()) : now();

        $obj = (object) array_merge($data, [
            'id' => $entry->get('legacy_id') ?? $entry->id(),
            'entry_id' => $entry->id(),
            'slug' => $entry->slug(),
            'collection' => $entry->collectionHandle(),
            'name' => $data['title'] ?? $entry->slug(),
            'publish_date' => $date,
            'created_at' => $date,
            // Solo la marca editorial de Statamic (CP). Evita lastModified/file mtime de imports.
            'updated_at' => $entry->get('updated_at')
                ? \Carbon\Carbon::createFromTimestamp((int) $entry->get('updated_at'), config('app.timezone'))
                : $date,
            'status' => $data['status_legacy'] ?? 'PUBLISHED',
            'cat_name' => self::categoryTitle($entry),
        ]);

        $legacyUrl = $data['url'] ?? null;

        // Banner aliases (Voyager column names)
        $obj->redirect_link = $obj->cta_url ?? ($obj->redirect_link ?? '');
        $obj->button_text = $obj->cta_text ?? ($obj->button_text ?? '');
        $obj->media_type = $obj->media_type ?? 'image';
        $obj->video_url = $obj->video_url ?? '';
        $obj->youtube_url = $obj->youtube_url ?? '';
        $obj->youtube_id = $obj->youtube_id ?? self::youtubeId($obj->youtube_url ?: null);
        $obj->youtube_click_url = $obj->youtube_click_url ?? '';
        $obj->text_display = $obj->text_display ?? 'on';
        $obj->description = $obj->description ?? '';
        $obj->thumbnail = $obj->thumbnail ?? '';
        $obj->thumbnail_mobile = $obj->thumbnail_mobile ?? '';
        $obj->inverted_text = $obj->inverted_text ?? false;
        $obj->target = $obj->target ?? '_self';

        // Social / about video aliases
        $obj->website = $obj->website ?? ($legacyUrl ?? '');
        $obj->class = $obj->class ?? ($obj->icon ?? '');
        $obj->video_thumbnail = $obj->video_thumbnail ?? ($obj->thumbnail ?? null);
        if (empty($obj->youtube_id)) {
            $obj->youtube_id = self::youtubeId($obj->youtube_url ?? null);
        }
        if (($obj->media_type ?? 'image') === 'youtube' && empty($obj->youtube_id) && ! empty($obj->youtube_url)) {
            $obj->youtube_id = self::youtubeId($obj->youtube_url);
        }

        if (! isset($obj->image) || ! $obj->image) {
            $obj->image = $obj->listing_image ?? ($obj->thumbnail ?? null);
        }
        if (! isset($obj->title_bg_image) || ! $obj->title_bg_image) {
            $obj->title_bg_image = $obj->title_image ?? null;
        }
        if (! isset($obj->thumbnail_mobile) || ! $obj->thumbnail_mobile) {
            $obj->thumbnail_mobile = $obj->thumbnail ?? null;
        }
        if (! isset($obj->image_alt)) {
            $obj->image_alt = $obj->title ?? '';
        }
        if (! isset($obj->question) && isset($obj->title)) {
            $obj->question = $obj->title;
        }

        // SEO / content defaults (missing fields break Blade property access on stdClass)
        $obj->title = self::decodeEntities($obj->title ?? ($entry->slug() ?? ''));
        $obj->seo_title = self::decodeEntities($obj->seo_title ?? $obj->title);
        $obj->meta_description = self::decodeEntities($obj->meta_description ?? ($obj->excerpt ?? ''));
        $obj->meta_keywords = self::decodeEntities($obj->meta_keywords ?? '');
        $obj->keywords = self::decodeEntities($obj->keywords ?? $obj->meta_keywords);
        $obj->excerpt = self::decodeEntities($obj->excerpt ?? '');
        $obj->sub_title = self::decodeEntities($obj->sub_title ?? '');
        $obj->body = self::decodeEntities($obj->body ?? '');
        $obj->description = self::decodeEntities($obj->description ?? '');
        $obj->answer = self::decodeEntities($obj->answer ?? '');
        $obj->image = $obj->image ?? null;
        $obj->category = $obj->category ?? 'generales';
        $obj->order = $obj->order ?? 0;

        if (isset($obj->city_other_data) && is_string($obj->city_other_data)) {
            $obj->city_other_data = self::decodeEntities($obj->city_other_data);
        }
        if (isset($obj->habitantes) && is_string($obj->habitantes)) {
            $obj->habitantes = self::decodeEntities($obj->habitantes);
        }
        if (isset($obj->looking_for) && is_string($obj->looking_for)) {
            $obj->looking_for = self::decodeEntities($obj->looking_for);
        }
        if (isset($obj->territory) && is_string($obj->territory)) {
            $obj->territory = self::decodeEntities($obj->territory);
        }
        if (isset($obj->state) && is_string($obj->state)) {
            $obj->state = self::decodeEntities($obj->state);
        }

        // Canonical public URL (posts under /noticias/{slug})
        $obj->url = self::entryUrl($obj);

        return $obj;
    }

    public static function postUrl(string $slug): string
    {
        return '/noticias/'.ltrim($slug, '/');
    }

    public static function pageUrl(string $slug): string
    {
        return '/'.ltrim($slug, '/');
    }

    public static function entryUrl(object $entry): string
    {
        $slug = $entry->slug ?? '';
        $collection = $entry->collection ?? '';

        if ($collection === 'posts') {
            return self::postUrl($slug);
        }
        if ($collection === 'pages') {
            return self::pageUrl($slug);
        }
        if ($collection === 'territories') {
            return '/nuestros-territorios-progreso/'.ltrim($slug, '/');
        }
        if ($collection === 'faqs') {
            return '/preguntas-frecuentes';
        }

        return $slug !== '' ? '/'.$slug : '#';
    }

    /**
     * Decode HTML entities to UTF-8 (Voyager dumps often store &oacute; etc.).
     */
    public static function decodeEntities(?string $value): string
    {
        if ($value === null || $value === '') {
            return '';
        }

        return html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    /**
     * Plain text for listings/search: strip tags + decode entities + collapse whitespace.
     */
    public static function plainText(?string $value): string
    {
        $decoded = self::decodeEntities($value);
        $stripped = strip_tags($decoded);
        $collapsed = preg_replace('/\s+/u', ' ', $stripped) ?? '';

        return trim($collapsed);
    }

    private static function youtubeId(?string $url): string
    {
        if (! $url) {
            return '';
        }
        if (preg_match('/(?:v=|youtu\.be\/|embed\/)([A-Za-z0-9_-]{6,})/', $url, $m)) {
            return $m[1];
        }

        return strlen($url) <= 20 ? $url : '';
    }

    private static function assetToPath(mixed $value): ?string
    {
        if ($value === null || $value === '' || $value === []) {
            return null;
        }
        if (is_array($value)) {
            $value = $value[0] ?? null;
        }
        if (is_object($value) && method_exists($value, 'path')) {
            return $value->path();
        }

        return is_string($value) ? ltrim($value, '/') : null;
    }

    private static function categoryTitle($entry): ?string
    {
        $terms = $entry->get('categories');
        if (! $terms) {
            return null;
        }
        $slug = is_array($terms) ? ($terms[0] ?? null) : $terms;
        if (! $slug) {
            return null;
        }

        $term = Term::query()->where('taxonomy', 'categories')->where('slug', $slug)->first();

        return $term?->get('title') ?? $slug;
    }
}
