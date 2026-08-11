@extends('layouts.app',[
'description'=>$page->meta_description ?? $page->excerpt ?? null,
'title'=>$page->seo_title ?? $page->title ?? null,
'keywords'=>$page->meta_keywords ?? $page->keywords ?? null,
'ogimage'=>$page->image ?? null
])
@section('content')
    @include('components.extra-header')
    @include('components.content_page')
@endsection
