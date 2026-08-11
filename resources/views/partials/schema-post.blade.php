@php
    $published = \Carbon\Carbon::parse($post->created_at ?? $post->publish_date ?? now());
    $modified = \Carbon\Carbon::parse($post->updated_at ?? $published);
    $postCanonical = url(post_url($post->slug));
    $imageUrl = ! empty($post->image)
        ? url('/storage/'.ltrim($post->image, '/'))
        : url('/assets/img/abriendo-puertas-head-desktop.jpg');
    $orgName = setting('site.title') ?: 'Fundación Grupo Social';
    $orgLogo = setting('site.logo')
        ? url('/storage/'.ltrim(setting('site.logo'), '/'))
        : url('/assets/svg/logo_fgs.svg');
    $description = $post->meta_description ?: ($post->excerpt ?: $post->title);

    $newsArticle = [
        '@context' => 'https://schema.org',
        '@type' => 'NewsArticle',
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => $postCanonical,
        ],
        'headline' => \Illuminate\Support\Str::limit($post->seo_title ?: $post->title, 110, ''),
        'description' => $description,
        'image' => [$imageUrl],
        'datePublished' => $published->toAtomString(),
        'dateModified' => $modified->toAtomString(),
        'author' => [
            '@type' => 'Organization',
            'name' => $orgName,
            'url' => url('/'),
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => $orgName,
            'logo' => [
                '@type' => 'ImageObject',
                'url' => $orgLogo,
            ],
        ],
        'inLanguage' => 'es-CO',
        'isAccessibleForFree' => true,
        'url' => $postCanonical,
    ];

    if (! empty($post->cat_name)) {
        $newsArticle['articleSection'] = $post->cat_name;
    }

    $breadcrumb = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Inicio',
                'item' => url('/'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Noticias',
                'item' => url('/noticias'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $post->title,
                'item' => $postCanonical,
            ],
        ],
    ];
@endphp

<script type="application/ld+json">{!! json_encode($newsArticle, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumb, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) !!}</script>
