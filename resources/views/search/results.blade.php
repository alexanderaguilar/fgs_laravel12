@extends('layouts.app')

@section('content')
@include('partials.breadcrumb', ['items' => [['label' => 'Búsqueda']]])
<section class="site-search-results py-5">
    <div class="container">
        <h1 class="text-deepblue we_700 colored_lines position-relative pb-3 mb-4 d-inline-block">
            Resultados de búsqueda
        </h1>

        @if(mb_strlen($query) < 3)
            <p class="text-secondary mb-4">Escribe al menos 3 caracteres para buscar.</p>
            <a href="/" class="btn btn-primary">Volver al inicio</a>
        @else
            <p class="mb-4 text-secondary">
                Consulta: <strong class="text-deepblue">“{{ $query }}”</strong>
                @if($paginatedResults->total())
                    — {{ $paginatedResults->total() }} resultado{{ $paginatedResults->total() === 1 ? '' : 's' }}
                @endif
            </p>

            @if($paginatedResults->count())
                <ul class="list-unstyled site-search-results__list mb-4">
                    @foreach($paginatedResults as $result)
                        <li class="site-search-results__item mb-3">
                            <a href="{{ entry_url($result) }}" class="site-search-results__link d-block p-3 rounded-3 text-decoration-none">
                                @if(!empty($result->search_type))
                                    <span class="site-search__type">{{ $result->search_type }}</span>
                                @endif
                                <span class="d-block fw-bold text-deepblue fs-5">{{ $result->title }}</span>
                                @if(!empty($result->search_excerpt) || !empty($result->excerpt))
                                    <span class="d-block text-secondary mt-1">
                                        {{ \Illuminate\Support\Str::limit($result->search_excerpt ?? $result->excerpt ?? '', 180) }}
                                    </span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>

                {{ $paginatedResults->links() }}
            @else
                <p class="my-4">No se encontraron resultados. Prueba con otro criterio.</p>
            @endif
        @endif
    </div>
</section>
@endsection
