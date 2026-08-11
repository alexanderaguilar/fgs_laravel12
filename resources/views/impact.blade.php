@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/css/pages/impact.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('components.extra-header')
    @include('components.content_impact')
@endsection