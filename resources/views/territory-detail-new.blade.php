@extends('layouts.app',[
'description'=>$citydata->meta_description, 
'title'=>$citydata->seo_title,
'keywords'=>$citydata->meta_keywords,
'ogimage'=>$citydata->listing_image
])

@push('styles')
    <link href="{{ asset('assets/css/pages/impact.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pages/territories.css') }}?v={{ filemtime(public_path('assets/css/pages/territories.css')) }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endpush

@push('scripts')
    <script defer src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script defer src="{{ asset('assets/js/fgs/territories-map.js') }}"></script>
@endpush

@section('content')

    @include('components.territory_page_new')
   
@endsection
