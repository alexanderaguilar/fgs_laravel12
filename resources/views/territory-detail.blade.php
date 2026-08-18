@extends('layouts.app',[
'description'=>$citydata->meta_description, 
'title'=>$citydata->seo_title,
'keywords'=>$citydata->meta_keywords,
'ogimage'=>$citydata->listing_image
])

@push('styles')
    <link href="{{ asset('assets/css/pages/impact.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pages/territories.css') }}?v={{ filemtime(public_path('assets/css/pages/territories.css')) }}" rel="stylesheet">
@endpush

@section('content')

    @include('components.territory_page')
   
@endsection