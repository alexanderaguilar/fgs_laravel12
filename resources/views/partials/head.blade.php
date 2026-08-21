<head>
    <!-- Google Tag Manager -->
    {!! setting('site.google_tag_manager') !!}
    <!-- END Google Tag Manager -->
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ToDo: Google Tag Manager -->

    @if(isset($title))
    <title>{{$title}} - {{setting('site.title')}}</title>
    <meta property="og:title" content="{{$title}} - {{setting('site.title')}}">
    <meta name="twitter:title" content="{{$title}} - {{setting('site.title')}}">
    @else
    <title>{{setting('site.title')}}</title>
    <meta property="og:title" content="{{setting('site.title')}}">
    <meta name="twitter:title" content="{{setting('site.title')}}">
    @endif

    @if(isset($description))
    <meta name="description" content="{{$description}}">
    <meta property="og:description" content="{{$description}}">
    <meta name="twitter:description" content="{{$description}}">
    @else
    <meta name="description" content="{{setting('site.description')}}">
    <meta property="og:description" content="{{setting('site.description')}}">
    <meta name="twitter:description" content="{{setting('site.description')}}">
    @endif

    @if(isset($keywords))
    <meta name="keywords" content="{{$keywords}}">
    @else
    <meta name="keywords" content="{{setting('site.keywords')}}">
    @endif

    @php
        $defaultOg = url('/assets/img/abriendo-puertas-head-desktop.jpg');
        if (! empty($ogimage)) {
            $ogImageUrl = str_starts_with($ogimage, 'http')
                ? $ogimage
                : url('/storage/'.ltrim($ogimage, '/'));
        } else {
            $ogImageUrl = $defaultOg;
        }
        $ogTypeValue = $ogType ?? 'website';
    @endphp

    <meta property="og:image" content="{{ $ogImageUrl }}">
    <meta name="twitter:image" content="{{ $ogImageUrl }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="{{ $ogTypeValue }}">
    <meta property="og:locale" content="es_CO">
    <meta property="og:site_name" content="{{ setting('site.title') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ parse_url(config('app.url'), PHP_URL_HOST) }}">
    <meta property="twitter:url" content="{{ url()->current() }}">

    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">

    @stack('head')


    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/fav/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/fav/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/fav/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/fav/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/fav/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/fav/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/fav/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/fav/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/fav/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/img/fav/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/fav/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/fav/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/fav/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/fav/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">   

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}">
    <!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.helper.ie8.js"></script><![endif]-->
    <link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    {{-- Modular shared UI (extracted from Blade <style> blocks) --}}
    <link href="{{ asset('assets/css/components/header.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/breadcrumb.css') }}?v={{ filemtime(public_path('assets/css/components/breadcrumb.css')) }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/highlighted-banner.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/page-title-hero.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/banners.css') }}?v={{ filemtime(public_path('assets/css/components/banners.css')) }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/tabs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/faq-accordion.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/bento-kpi.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/companies.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/about.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/books.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/home-campaigns.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/home-ctas.css') }}?v={{ filemtime(public_path('assets/css/components/home-ctas.css')) }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components/search-overlay.css') }}" rel="stylesheet">

    @stack('styles')

    <?php /* <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet"> */ ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha384-XGjxtQfXaH2tnPFa9x+ruJTuLE3Aa6LhHSWRr1XeTyhezb4abCG4ccI5AkVDxqC+" crossorigin="anonymous">
    
</head>