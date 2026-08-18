@include('partials.breadcrumb', ['items' => [['label' => 'Testimonios']]])
<section id="blog" class="bg-light pt-3 pb-3">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col py-3">
                <h1>Testimonios</h1>
            </div>
        </div>

        <ul class="nav nav-pills justify-content-center justify-content-md-start flex-wrap gap-2 mb-4" role="navigation" aria-label="Filtrar testimonios">
            <li class="nav-item">
                <a class="nav-link px-4 {{ ($fuente ?? 'empresas') === 'empresas' ? 'active' : '' }}"
                   href="{{ route('testimonials.index', ['fuente' => 'empresas']) }}">
                    Desde nuestras empresas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-4 {{ ($fuente ?? '') === 'territorios' ? 'active' : '' }}"
                   href="{{ route('testimonials.index', ['fuente' => 'territorios']) }}">
                    Desde nuestros Territorios Progreso
                </a>
            </li>
        </ul>

        @if(($fuente ?? 'empresas') === 'empresas')
            <p class="text-secondary mb-4 col-lg-10 px-0">
                Esta es la voz de personas, microempresarios y emprendedores a quienes nuestras empresas les han abierto oportunidades para progresar.
            </p>
        @else
            <p class="text-secondary mb-4 col-lg-10 px-0">
                Esta es la voz de los habitantes de las comunidades que acompañamos desde los Territorios Progreso.
            </p>
        @endif
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row" id="post-container">
            @if($posts->count() === 0)
                <div class="col-12 text-center py-5 text-muted">No hay testimonios en esta categoría.</div>
            @else
                @include('partials.posts')
            @endif
        </div>
    </div>

    <div class="text-center my-4" id="loading" style="display: none;">
        <i class="bi bi-arrow-repeat" style="font-size: 2rem; animation: spin 1s linear infinite;"></i>
    </div>

    <input type="hidden" id="next-page-url" value="{{ $posts->nextPageUrl() }}">
</section>
