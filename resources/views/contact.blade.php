@extends('layouts.app',[
'description'=>'Contáctenos Fundación Grupo Social', 
'title'=>'Contacto',
'keywords'=>'Contacto, Fundación, Grupo, Social',
'ogimage'=>'img/fgs.jpg'
])

@push('styles')
    <link href="{{ asset('assets/css/pages/contact.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script defer src="{{ asset('assets/js/fgs/contact.js') }}"></script>
@endpush

@section('content')
    @include('components.contact_page')
@endsection