<!-- Estilos Personalizados -->
@include('partials.breadcrumb', ['items' => [['label' => 'Viaje por el modelo de calidad de vida', 'url' => '/viaje-por-el-modelo-de-calidad-de-vida'], ['label' => 'Etapa de construcción']]])

<div class="container-fluid position-relative m-0 p-0 pb-5 overflow-hidden" style="background-image: url({{ asset('assets/img/calidad_vida/bg_irregular_line.jpg') }}); background-size: cover; background-position: center;">

        <div class="container fgs_article_head position-relative">
            <div class="row justify-content-center mt-2 mb-5 p-2 p-md-4">

                <div class="col-12 col-lg-10">
                    <h1 class="my-5 display-3 main-title" style="line-height:3.2rem !important;">Viaje por el Modelo de Calidad de Vida: <span class="">Etapa de Construcción de Estrategia</span></h1>
                </div>
                <div class="col-12 col-lg-10">
                    <p class="my-2" style="font-size:1.6rem; line-height:2.2rem; text-align: justify;">Después de recorrer juntos la <strong>Etapa de Entendimiento</strong>, donde conocimos el territorio, sus actores, dinámicas y oportunidades, damos el siguiente paso en este camino compartido: la <strong>Etapa de Construcción de Estrategia</strong>. En esta nueva parada del viaje, trazamos la hoja de ruta que orientará las acciones para mejorar la calidad de vida, definiendo junto con las comunidades y aliados los objetivos, prioridades y apuestas que marcarán el rumbo hacia <strong>el futuro deseado</strong>.
<br><br>
Haz clic en cada uno de los círculos del mapa y descubre los contenidos interactivos que muestran cómo seguimos construyendo, de manera colectiva, los caminos del desarrollo en cada territorio.</p>
                </div>
        
            </div>
        </div>
            
</div>

    @php
        // Datos centralizados para todos los elementos
        $allItems = [
            [
                'id' => 'inicio',
                'img' => 'etapa_2_1.png',
                'title' => 'MODELO DE CALIDAD DE VIDA',
                'subtitle' => null,
                'number' => null,
                'pdf' => '0.INICIOoptimized.pdf',
                'color' => '' // None
            ],
            [
                'id' => 'metodologia',
                'img' => 'etapa_2_2.png',
                'title' => 'METODOLOGÍA',
                'subtitle' => null,
                'number' => '01',
                'pdf' => '1.METODOLOGIAoptimized.pdf',
                'color' => '#F08B5E' // Blue
            ],
            [
                'id' => 'comunicacion',
                'img' => 'etapa_2_3.png',
                'title' => 'COMUNICACIÓN',
                'subtitle' => '',
                'number' => '02',
                'pdf' => 'XXXX.pdf',
                'color' => '#8AFBA9' // Orange
            ],
            [
                'id' => 'recursos',
                'img' => 'etapa_2_4.png',
                'title' => 'RECURSOS METOGOLÓGICOS',
                'subtitle' => '',
                'number' => '04',
                'pdf' => 'XXX.pdf',
                'color' => '#54BDD3' // Orange
            ],
            [
                'id' => 'aprendizajes',
                'img' => 'etapa_2_5.png',
                'title' => 'APRENDIZAJES',
                'subtitle' => '',
                'number' => '03',
                'pdf' => 'XXX.pdf',
                'color' => '#F08B5E' // Green
            ],
        ];
    @endphp

    <div class="main-container">
        <div class="container pb-5">

            <!-- VISTA DESKTOP: MAPA INTERACTIVO -->
            <section class="d-none d-lg-block">
                <div class="map-section-desktop position-relative">
                    <div class="map-background"></div>
                    @foreach($allItems as $item)
                    <div id="point-{{ $item['id'] }}" class="map-point">
                        <a href="{{ asset('assets/pdf/calidad_vida/' . $item['pdf']) }}" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('assets/img/calidad_vida/' . $item['img']) }}" alt="{{ $item['title'] }}">
                        </a>
                        <div class="point-text-content">
                            @if($item['number'])
                            <div class="point-number" style="background-color: {{ $item['color'] }};">{{ $item['number'] }}</div>
                            @endif
                            <h3 class="point-title">{{ $item['title'] }}</h3>
                            @if($item['subtitle'])
                            <p class="point-subtitle">{{ $item['subtitle'] }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <div class="p-3" style="position:absolute; top:0; left: 0; z-index:10; font-weight:bold;font-family: 'Roboto', sans-serif; font-size:1.3rem;line-height:3.3rem;"><span class="p-3"  style="background-color: #FF8552; color: white;">VIAJE POR EL MODELO DE CALIDAD DE VIDA: ETAPA DE CONSTRUCCIÓN DE LA ESTRATEGIA</span></div>
                    <div class="p-3 d-flex align-items-center" style="position:absolute; top:0; right: 0; z-index:11; font-weight:bold;font-family: 'Roboto', sans-serif; font-size:1.2rem;line-height:3.3rem;"><span class="p-3" style="color: #133C6D; text-transform:uppercase; line-height:17px; text-align: right;">Volver a ver etapa<br>de entendimiento</span><img src="{{ asset('assets/img/calidad_vida/etapa_brujula.png') }}" width="80"></div>
                    <div style="position:absolute; bottom:0; right: 0; z-index:10;">
                        <a href="{{ asset('assets/pdf/calidad_vida/guia_navegacion.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg m-4" style="font-family: 'Roboto', sans-serif;"><i class="bi bi-download"></i> Guía de navegación</a>
                    </div>
                </div>
            </section>

            <!-- VISTA MÓVIL: LISTA VERTICAL -->
            <main class="d-block d-lg-none" style="margin-top: -100px; z-index: 10; position: relative;">
                <div class="px-2 position-relative mb-2" style="height: 150px; overflow: hidden;">
                    <img src="{{ asset('assets/img/calidad_vida/bg_terrain.jpg') }}" class="img-fluid rounded mb-4" alt="Mapa del terreno">
                    <div class="p-3" style="position:absolute; top:10px; z-index:10; font-weight:bold;font-family: 'Roboto', sans-serif; font-size:1rem;line-height:2.2rem;"><span class="p-2" style="background-color: #FF8552; color: white;">VIAJE POR EL MODELO DE CALIDAD DE VIDA: ETAPA DE CONSTRUCCIÓN DE LA ESTRATEGIA</span></div>
                </div>
                <a href="{{ asset('assets/pdf/calidad_vida/guia_navegacion.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg m-4" style="font-family: 'Roboto', sans-serif;"><i class="bi bi-download"></i> Guía de navegación</a>
                @foreach($allItems as $item)
                <div class="item-card-mobile">
                    <img src="{{ asset('assets/img/calidad_vida/' . $item['img']) }}" alt="{{ $item['title'] }}">
                    <div class="item-card-content">
                        @if($item['number'])
                        <div class="point-number" style="background-color: {{ $item['color'] }};">{{ $item['number'] }}</div>
                        @endif
                        <h3 class="section-title">{{ $item['title'] }}</h3>
                        @if($item['subtitle'])
                        <p class="section-subtitle mb-2">{{ $item['subtitle'] }}</p>
                        @endif
                        <a href="{{ asset('assets/pdf/calidad_vida/' . $item['pdf']) }}" class="btn-download mt-2" target="_blank" rel="noopener noreferrer">Descargar PDF</a>
                    </div>
                </div>
                @endforeach
            </main>
        </div>
    </div>
    