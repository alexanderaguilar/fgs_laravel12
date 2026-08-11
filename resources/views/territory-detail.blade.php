@extends('layouts.app',[
'description'=>$citydata->meta_description, 
'title'=>$citydata->seo_title,
'keywords'=>$citydata->meta_keywords,
'ogimage'=>$citydata->listing_image
])

@push('styles')
    <link href="{{ asset('assets/css/pages/territories.css') }}" rel="stylesheet">
@endpush

@section('content')

    @include('components.extra-header')
    @include('components.territory_page')
   
@endsection