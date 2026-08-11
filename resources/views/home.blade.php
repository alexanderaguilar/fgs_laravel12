@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/css/pages/impact.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pages/news.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script defer src="{{ asset('assets/js/fgs/home.js') }}"></script>
@endpush

@section('content')

    @include('components.extra-header')
    @include('components.banners')
    @include('components.home_module_opening')
    @include('components.home_module_impact')
    @include('components.module_recent_news')

@endsection
