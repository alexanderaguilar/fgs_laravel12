<?php

namespace App\Support;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Statamic\Facades\Entry;
use Statamic\Facades\GlobalSet;
use Statamic\Facades\Nav;
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

    public static function search(string $query): Collection
    {
        $needle = mb_strtolower($query);

        $posts = Entry::query()->where('collection', 'posts')->whereStatus('published')->get();
        $pages = Entry::query()->where('collection', 'pages')->whereStatus('published')->get();

        return $posts->merge($pages)
            ->filter(function ($entry) use ($needle) {
                $hay = mb_strtolower(($entry->get('title') ?? '').' '.strip_tags((string) $entry->get('body')));

                return $needle !== '' && str_contains($hay, $needle);
            })
            ->map(fn ($entry) => self::present($entry))
            ->values();
    }

    public static function present($entry): object
    {
        $data = $entry->data()->all();
        foreach (['image', 'logo', 'thumbnail', 'thumbnail_mobile', 'listing_image', 'map_image', 'title_image', 'title_bg_image'] as $field) {
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
            'updated_at' => $entry->lastModified()
                ? \Carbon\Carbon::parse($entry->lastModified())
                : $date,
            'status' => $data['status_legacy'] ?? 'PUBLISHED',
            'cat_name' => self::categoryTitle($entry),
        ]);

        $legacyUrl = $data['url'] ?? null;

        // Banner aliases (Voyager column names)
        $obj->redirect_link = $obj->cta_url ?? ($obj->redirect_link ?? '');
        $obj->button_text = $obj->cta_text ?? ($obj->button_text ?? '');
        $obj->youtube_id = $obj->youtube_id ?? self::youtubeId($obj->youtube_url ?? null);
        $obj->text_display = $obj->text_display ?? 'on';
        $obj->description = $obj->description ?? '';

        // Social / about video aliases
        $obj->website = $obj->website ?? ($legacyUrl ?? '');
        $obj->class = $obj->class ?? ($obj->icon ?? '');
        $obj->video_thumbnail = $obj->video_thumbnail ?? ($obj->thumbnail ?? null);
        if (empty($obj->youtube_id)) {
            $obj->youtube_id = self::youtubeId($obj->youtube_url ?? null);
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
        $obj->title = $obj->title ?? ($entry->slug() ?? '');
        $obj->seo_title = $obj->seo_title ?? $obj->title;
        $obj->meta_description = $obj->meta_description ?? ($obj->excerpt ?? '');
        $obj->meta_keywords = $obj->meta_keywords ?? '';
        $obj->keywords = $obj->keywords ?? $obj->meta_keywords;
        $obj->excerpt = $obj->excerpt ?? '';
        $obj->sub_title = $obj->sub_title ?? '';
        $obj->body = $obj->body ?? '';
        $obj->image = $obj->image ?? null;
        $obj->category = $obj->category ?? 'generales';
        $obj->order = $obj->order ?? 0;
        $obj->answer = $obj->answer ?? '';

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
        if (($entry->collection ?? '') === 'posts') {
            return self::postUrl($slug);
        }
        if (($entry->collection ?? '') === 'pages') {
            return self::pageUrl($slug);
        }

        return $slug !== '' ? '/'.$slug : '#';
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
