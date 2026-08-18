<!-- Estilos Personalizados -->
@include('partials.breadcrumb', ['items' => [['label' => 'Viaje por el modelo de calidad de vida']]])

<div class="container-fluid position-relative m-0 p-0 pb-5 overflow-hidden" style="background-image: url({{ asset('assets/img/calidad_vida/bg_irregular_line.jpg') }}); background-size: cover; background-position: center;">
    <div class="container fgs_article_head position-relative">
        <div class="row justify-content-center mt-2 mb-5 p-2 p-md-4">
            <div class="col-12 col-lg-10">
                <h1 class="mt-3 display-3 main-title" style="line-height:4.2rem !important;">Viaje por el Modelo de Calidad de Vida</h1>
            </div>
            <div class="col-12 col-lg-10">
                <p class="my-2" style="font-size:1.6rem; line-height:2.2rem; text-align: justify;">Bienvenido al Modelo de Calidad de Vida, la apuesta de Fundación Grupo Social para acompañar a las comunidades en el mejoramiento integral de su calidad de vida y promover una cultura basada en el bien común, a través del trabajo conjunto con actores estratégicos de los territorios.</p>
            </div>
        </div>
    </div>
</div>

@php
    $allItems = [
        [
            'id' => 'inicio',
            'img' => '0INICIO.png',
            'title' => 'MODELO DE CALIDAD DE VIDA',
            'number' => null,
            'pdf' => '0.INICIOoptimized.pdf',
            'color' => '',
            'status' => 'active'
        ],
        [
            'id' => 'entendimiento',
            'img' => '01METODOLOGIA.png',
            'title' => 'ENTENDIMIENTO DEL TERRITORIO',
            'number' => '01',
            'pdf' => '1.METODOLOGIAoptimized.pdf',
            'color' => '#3498db',
            'status' => 'active',
            'has_popover' => true,
            'sub_links' => [
                ['name' => 'Informe Entendimiento Tangua', 'url' => asset('assets/pdf/calidad_vida/2.TANGUAoptimized.pdf')],
                ['name' => 'Informe Entendimiento Algeciras', 'url' => asset('assets/pdf/calidad_vida/3.ALGECIRASoptimized.pdf')],
                ['name' => 'Informe Entendimiento Sierra Morena', 'url' => asset('assets/pdf/calidad_vida/4.SIERRA-MORENAoptimized.pdf')],
                ['name' => 'Informe Entendimiento Bilbao', 'url' => asset('assets/pdf/calidad_vida/5.BILBAOoptimized.pdf')],
            ]
        ],
        [
            'id' => 'construccion',
            'img' => '02TANGUA.png', // Usando assets existentes como placeholder
            'title' => 'CONSTRUCCIÓN DE LA ESTRATEGIA',
            'number' => '02',
            'pdf' => 'construccion_de_la_estrategia_Modelo_de_Calidad_de_Vida.pdf',
            'color' => '#f39c12',
            'status' => 'active'
        ],
        [
            'id' => 'desarrollo',
            'img' => '04SIERRAMORENA.png',
            'title' => 'DESARROLLO DE LA ESTRATEGIA',
            'number' => '03',
            'pdf' => '#',
            'color' => '#27ae60',
            'status' => 'soon'
        ],
        [
            'id' => 'logro',
            'img' => '05BILBAO.png',
            'title' => 'LOGRO DE RESULTADOS',
            'number' => '04',
            'pdf' => '#',
            'color' => '#27ae60',
            'status' => 'soon'
        ],
    ];
@endphp

<div class="main-container">
    <div class="container pb-5">

        <!-- VISTA DESKTOP -->
        <section class="d-none d-lg-block">
            <div class="map-section-desktop position-relative">
                <div class="map-background"></div>
                
                @foreach($allItems as $item)
                    <div id="point-{{ $item['id'] }}" class="map-point {{ $item['status'] == 'soon' ? 'coming-soon' : '' }}"
                         @if(!empty($item['has_popover'])) 
                            data-bs-toggle="popover" 
                            data-bs-html="true" 
                            data-bs-trigger="click"
                            title="Entendimiento por Territorio"
                            data-bs-content="<ul class='popover-link-list'>
                                <li><a href='{{ asset('assets/pdf/calidad_vida/' . $item['pdf']) }}' target='_blank'><b>Metodología General</b></a></li>
                                @foreach($item['sub_links'] as $sub)
                                <li><a href='{{ $sub['url'] }}' target='_blank'>{{ $sub['name'] }}</a></li>
                                @endforeach
                            </ul>"
                         @endif
                    >
                        @if($item['status'] == 'active' && empty($item['has_popover']))
                            <a href="{{ asset('assets/pdf/calidad_vida/' . $item['pdf']) }}" target="_blank">
                                <img src="{{ asset('assets/img/calidad_vida/' . $item['img']) }}" alt="{{ $item['title'] }}">
                            </a>
                        @else
                            <img src="{{ asset('assets/img/calidad_vida/' . $item['img']) }}" alt="{{ $item['title'] }}">
                        @endif

                        <div class="point-text-content">
                            @if($item['number'])
                                <div class="point-number" style="background-color: {{ $item['color'] }};">{{ $item['number'] }}</div>
                            @endif
                            <h3 class="point-title">
                                {{ $item['title'] }}
                                @if($item['status'] == 'soon') <br><small class="badge-soon">Próximamente</small> @endif
                            </h3>
                        </div>
                    </div>
                @endforeach

                <div class="p-3" style="position:absolute; bottom:0; left: 0; z-index:10; font-weight:bold; font-family: 'Roboto', sans-serif; font-size:1.6rem; line-height:3.3rem;">
                    <span class="p-3" style="background-color: #FF8552; color: white;">Explora,</span>
                    <span class="p-3" style="background-color: #003B71; color: white;">conecta</span>
                    <span class="p-3" style="background-color: #27B2D5; color: #003B71;">y descubre este viaje</span>
                </div>

                <div style="position:absolute; bottom:0; right: 0; z-index:10;">
                    <a href="{{ asset('assets/pdf/calidad_vida/guia_navegacion.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg m-4" style="font-family: 'Roboto', sans-serif;"><i class="bi bi-download"></i> Guía de navegación</a>
                </div>
            </div>
        </section>

        <!-- VISTA MÓVIL -->
        <main class="d-block d-lg-none" style="margin-top: -100px; z-index: 10; position: relative;">
            <div class="px-2 position-relative mb-4" style="height: 150px; overflow: hidden;">
                <img src="{{ asset('assets/img/calidad_vida/bg_terrain.jpg') }}" class="img-fluid rounded mb-4" alt="Mapa">
                <div class="p-3" style="position:absolute; top:10px; z-index:10; font-weight:bold; font-family: 'Roboto', sans-serif; font-size:1rem; line-height:2.2rem;">
                    <span class="p-2" style="background-color: #FF8552; color: white;">Explora y descubre</span>
                </div>
                <a href="{{ asset('assets/pdf/calidad_vida/guia_navegacion.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg m-4" style="font-family: 'Roboto', sans-serif;"><i class="bi bi-download"></i> Guía de navegación</a>
            </div>

            @foreach($allItems as $item)
                <div class="item-card-mobile {{ $item['status'] == 'soon' ? 'opacity-50' : '' }}">
                    <img src="{{ asset('assets/img/calidad_vida/' . $item['img']) }}" alt="{{ $item['title'] }}">
                    <div class="item-card-content w-100">
                        @if($item['number'])
                            <div class="point-number" style="background-color: {{ $item['color'] }};">{{ $item['number'] }}</div>
                        @endif
                        <h3 class="section-title" style="font-size: 1.1rem;">{{ $item['title'] }}</h3>
                        
                        @if($item['status'] == 'active')
                            @if(!empty($item['has_popover']))
                                <div class="mt-2 d-flex flex-wrap gap-2">
                                    <a href="{{ asset('assets/pdf/calidad_vida/' . $item['pdf']) }}" class="btn-download" target="_blank">Metodología</a>
                                    @foreach($item['sub_links'] as $sub)
                                        <a href="{{ $sub['url'] }}" class="btn-download" target="_blank">{{ str_replace('Informe Entendimiento ', '', $sub['name']) }}</a>
                                    @endforeach
                                </div>
                            @else
                                <a href="{{ asset('assets/pdf/calidad_vida/' . $item['pdf']) }}" class="btn-download mt-2" target="_blank">Descargar PDF</a>
                            @endif
                        @else
                            <span class="badge-soon">Próximamente</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </main>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 d-none d-lg-block">
            <p class="mx-2 mb-5" style="font-size:1.2rem; line-height:1.8rem; text-align: justify;">Haga clic en cada uno de los círculos del mapa para explorar los contenidos en formato PDF interactivo y conocer cómo, a partir de datos, relatos y aprendizajes colectivos, se construyen paso a paso las trayectorias irreversibles hacia la calidad de vida en los Territorios Progreso.</p>
        </div>
    </div>
    
</div>
