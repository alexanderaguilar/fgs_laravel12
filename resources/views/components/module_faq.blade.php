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

{{-- Estilos para asegurar que en celulares los tabs sean arrastrables/scrolleables sin romper el diseño --}}
<section class="faq-section">
    <div class="container">

        <div class="row pb-5">
            <!-- TABS VERTICALES (Lado Izquierdo) -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="nav nav-pills faq-vertical-tabs" id="faq-v-pills-tab" role="tablist" aria-orientation="vertical">
                    @php $isFirstTab = true; @endphp

                    @foreach($faqCategories as $key => $category)
                        <button class="nav-link w-100 text-md-start {{ $isFirstTab ? 'active' : '' }}" 
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

            <!-- CONTENIDO DE LOS TABS / ACORDEONES (Lado Derecho) -->
            <div class="col-12 col-md-8 col-lg-9">
                <div class="tab-content" id="faq-v-pills-tabContent">
                    
                    @php 
                        $isFirstTab = true; 
                        $globalIdCounter = 1; // Contador global para IDs únicos de acordeón
                    @endphp

                    @foreach($faqCategories as $key => $category)
                        <div class="tab-pane fade {{ $isFirstTab ? 'show active' : '' }}" 
                             id="v-pills-{{ $key }}" 
                             role="tabpanel" 
                             aria-labelledby="v-pills-{{ $key }}-tab">
                            
                            <!-- Acordeón del grupo -->
                            <div class="accordion" id="accordion-{{ $key }}">
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