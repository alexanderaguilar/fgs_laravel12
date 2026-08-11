@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/css/pages/w4p.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('components.content_page_w4p')
@endsection