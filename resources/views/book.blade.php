@extends('layouts.app',[
'description'=>'Etapa de Entendimiento', 
'title'=>'Viaje por el Modelo de Calidad de Vida',
'keywords'=>'Modelo, Calidad, Fundación, Grupo, Social',
'ogimage'=>'img/fgs.jpg'
])

@push('scripts')
    <script defer src="{{ asset('assets/js/fgs/books.js') }}"></script>
@endpush

@section('content')
    @include('components.content_book')
@endsection
