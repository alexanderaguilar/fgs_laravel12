@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/css/pages/impact.css') }}?v={{ filemtime(public_path('assets/css/pages/impact.css')) }}" rel="stylesheet">
@endpush

@section('content')
    @include('components.content_impact')
@endsection