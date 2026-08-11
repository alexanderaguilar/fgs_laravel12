@extends('layouts.app')

@section('content')
@include('components.extra-header')
<div class="container">
    <h2 class="my-5 pb-5">Resultados de consulta para "{{ $query }}"</h2>

    @if($paginatedResults->count())
        <ul class="list-group mb-5">
            @foreach($paginatedResults as $result)
                <li class="list-group-item">
                    <a href="{{ entry_url($result) }}">{{ $result->title }}
                        <p class="text-muted"><small>{{ \Illuminate\Support\Str::limit($result->excerpt ?? '', 150) }} (Ver más)</small></p>
                    </a>
                </li>
            @endforeach
        </ul>

        {{ $paginatedResults->links() }}
    @else
        <p class="my-5">No se encontraron resultados, prueba con otro criterio</p>
    @endif
</div>
@endsection
