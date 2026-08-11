<?php

use App\Support\Cms;

if (! function_exists('setting')) {
    function setting(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return null;
        }

        // Voyager used "site.title"; Statamic globals use field handles under site.
        $field = str_starts_with($key, 'site.') ? substr($key, 5) : $key;

        // Legacy typo compatibility
        if ($field === 'footer_letephone') {
            $field = 'footer_telephone';
        }

        return Cms::site($field, $default);
    }
}

if (! function_exists('menu')) {
    /**
     * Render a Statamic navigation tree partial.
     * Handles: front_main_menu, front_footer_left, front_footer_right, front_interest_menu, front_mobile_top_menu.
     */
    function menu(string $name, ?string $partial = null): string
    {
        $handle = str_replace('-', '_', $name);
        $items = Cms::navItems($handle);
        if ($items->isEmpty()) {
            return '';
        }

        $view = $partial ?? 'menu.main_menu';

        return view($view, ['items' => $items])->render();
    }
}

if (! function_exists('post_url')) {
    function post_url(string $slug): string
    {
        return Cms::postUrl($slug);
    }
}

if (! function_exists('entry_url')) {
    function entry_url(object $entry): string
    {
        return Cms::entryUrl($entry);
    }
}
