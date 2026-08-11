@extends('layouts.app',[
    'description' => $post->meta_description ?? $post->excerpt ?? null,
    'title' => $post->seo_title ?? $post->title ?? null,
    'keywords' => $post->meta_keywords ?? null,
    'ogimage' => $post->image ?? null,
    'ogType' => 'article',
    'canonical' => url(post_url($post->slug)),
])

@push('styles')
    <link href="{{ asset('assets/css/pages/news.css') }}" rel="stylesheet">
@endpush

@push('head')
    @php
        $publishedAt = \Carbon\Carbon::parse($post->created_at ?? now());
        $modifiedAt = \Carbon\Carbon::parse($post->updated_at ?? $publishedAt);
    @endphp
    <meta property="article:published_time" content="{{ $publishedAt->toAtomString() }}">
    <meta property="article:modified_time" content="{{ $modifiedAt->toAtomString() }}">
    <meta property="article:section" content="{{ $post->cat_name ?? 'Noticias' }}">
    <meta name="author" content="{{ setting('site.title') ?: 'Fundación Grupo Social' }}">
    @include('partials.schema-post')
@endpush

@section('content')

    @include('components.extra-header')
    @include('components.post-detail')
    @include('components.sticky-share')
   
@endsection
