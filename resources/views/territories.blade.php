@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/css/pages/territories.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script defer src="{{ asset('assets/js/fgs/territories-list.js') }}"></script>
@endpush

@section('content')
    @include('components.content_territories')
@endsection