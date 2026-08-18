@extends('layouts.app',[
'description'=>'campaña', 
'title'=>'Porque aquí si',
'keywords'=>'Fundación, Grupo, Social',
'ogimage'=>'img/fgs.jpg'
])

@push('styles')
    <link href="{{ asset('assets/css/pages/because.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="importmap">
    {
        "imports": {
            "three": "https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.js"
        }
    }
    </script>
    <script type="module" src="{{ asset('assets/js/fgs/because.js') }}"></script>
@endpush

@section('content')
    @include('components.content_because')
@endsection