<section id="bread-crumb" class="bg-light py-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col px-4">
                <p class="mb-0 small">
                    <a href="/" class="text-decoration-none text-secondary">Inicio</a> - 
                    <a href="/preguntas-frecuentes" class="text-decoration-none text-dark fw-bold">Preguntas frecuentes</a>
                </p>
            </div>
        </div>
    </div>
</section>

<div class="highlighted_banner position-relative d-none d-md-block" data-aos="fade-up" data-aos-duration="1000">
    <div class="position-relative content h-100">
        <img class="object-fit-cover" src="/assets/img/2026/2026_faq_page.jpg" onerror="this.src='https://placehold.co/1920x600?text=Preguntas+Frecuentes'" alt="Preguntas Frecuentes">

        <div class="position-absolute info infoExt text-start">
            <a class="btn btn-secondary mb-3 btn-sm" data-action="history-back" href="#">
                <i class="fas fa-arrow-left me-2"></i> Volver
            </a>
            <h1 class="my-2 text-white fw-bold display-4">Preguntas frecuentes</h1>
        </div>
    </div>            
</div>

<h1 class="m-3 mt-4 mb-2 fw-bold fst-italic d-block d-md-none"><span class="text-deepblue">Preguntas frecuentes</span></h1>

@php
    $tabMeta = [
        'generales' => 'GENERALES',
        'empresas' => 'EMPRESAS',
        'territorios' => 'TERRITORIOS PROGRESO',
    ];

    $faqEntries = \App\Support\Cms::entries('faqs', fn ($q) => $q->orderBy('order'));

    $faqCategories = [];
    foreach ($tabMeta as $key => $title) {
        $faqs = $faqEntries
            ->filter(fn ($f) => ($f->category ?? 'generales') === $key)
            ->sortBy(fn ($f) => (int) ($f->order ?? 0))
            ->values()
            ->map(fn ($f) => [
                'q' => $f->title ?? $f->question ?? '',
                'a' => $f->answer ?? '',
            ])
            ->all();

        if (count($faqs) > 0) {
            $faqCategories[$key] = [
                'title' => $title,
                'faqs' => $faqs,
            ];
        }
    }
@endphp

<section class="py-5 bg-light">
    <div class="container">
        
        <!-- Encabezado de sección -->
        <div class="row align-items-center mb-5 text-center text-md-start" data-aos="fade-up">
            <div class="col-12 col-md-5 mb-3 mb-md-0">
                <h2 class="fw-bold mb-0 text-deepblue fst-italic">Preguntas Frecuentes</h2>
                <div class="d-none d-md-block mt-3">
                    <div class="colored_lines"></div>
                </div>
            </div>
            
            <div class="col-12 col-md-7">
                <p class="fs-6 text-secondary mb-0">
                    A continuación, encontrará algunas preguntas y respuestas acerca de Fundación Grupo Social y su trabajo directo con comunidades y sus empresas.
                </p>
            </div>
        </div>

        <!-- Distribución principal Tabs y Contenido -->
        <div class="row">
            
            <!-- Columna Izquierda: Pestañas de Navegación -->
            <div class="col-12 col-md-4 col-lg-3 mb-4 mb-md-0" data-aos="fade-right">
                <div class="nav nav-pills nav-pills-custom faq-vertical-tabs" id="faq-v-pills-tab" role="tablist" aria-orientation="vertical">
                    @php $isFirstTab = true; @endphp

                    @foreach($faqCategories as $key => $category)
                        <button class="nav-link {{ $isFirstTab ? 'active' : '' }}" 
                                id="v-pills-{{ $key }}-tab" 
                                data-bs-toggle="pill" 
                                data-bs-target="#v-pills-{{ $key }}" 
                                type="button" 
                                role="tab" 
                                aria-controls="v-pills-{{ $key }}" 
                                aria-selected="{{ $isFirstTab ? 'true' : 'false' }}">
                            {{ $category['title'] }}
                        </button>
                        @php $isFirstTab = false; @endphp
                    @endforeach
                </div>
            </div>

            <!-- Columna Derecha: Acordeones de Preguntas -->
            <div class="col-12 col-md-8 col-lg-9" data-aos="fade-left">
                <div class="tab-content" id="faq-v-pills-tabContent">
                    
                    @php 
                        $isFirstTab = true; 
                        $globalIdCounter = 1; 
                    @endphp

                    @foreach($faqCategories as $key => $category)
                        <div class="tab-pane fade {{ $isFirstTab ? 'show active' : '' }}" 
                             id="v-pills-{{ $key }}" 
                             role="tabpanel" 
                             aria-labelledby="v-pills-{{ $key }}-tab">
                            
                            <!-- Acordeón del grupo -->
                            <div class="accordion accordion-custom" id="accordion-{{ $key }}">
                                @foreach($category['faqs'] as $fq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $globalIdCounter }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $globalIdCounter }}" aria-expanded="false" aria-controls="collapse{{ $globalIdCounter }}">
                                                {{ $fq['q'] }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $globalIdCounter }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $globalIdCounter }}" data-bs-parent="#accordion-{{ $key }}">
                                            <div class="accordion-body">
                                                {!! $fq['a'] !!}
                                            </div>
                                        </div>
                                    </div>
                                    @php $globalIdCounter++; @endphp
                                @endforeach
                            </div>
                            
                        </div>
                        @php $isFirstTab = false; @endphp
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>