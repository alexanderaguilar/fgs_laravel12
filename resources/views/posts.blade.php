@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/css/pages/news.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script defer src="{{ asset('assets/js/fgs/posts-infinite.js') }}"></script>
@endpush

@section('content')

    @include('components.extra-header')
    @include('components.posts')

@endsection