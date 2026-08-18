@extends('layouts.app',[
'description'=>$citydata->meta_description, 
'title'=>$citydata->seo_title,
'keywords'=>$citydata->meta_keywords,
'ogimage'=>$citydata->listing_image
])
@section('content')

    @include('components.community_page')
   
@endsection