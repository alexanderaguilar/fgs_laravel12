@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/css/pages/transparency.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('components.extra-header')
    @include('components.content_transparency')
@endsection