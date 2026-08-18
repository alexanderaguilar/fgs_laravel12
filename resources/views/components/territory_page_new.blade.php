@include('partials.breadcrumb', ['items' => [
    ['label' => 'Nuestros Territorios Progreso', 'url' => '/nuestros-territorios-progreso'],
    ['label' => $citydata->title],
]])

<!-- BANNER PRINCIPAL -->
<div class="highlighted_banner position-relative d-none d-md-block" data-aos="fade-up" data-aos-duration="1000">
    <div class="position-relative content h-100">
        <img class="object-fit-cover" src="/storage/{{$citydata->image}}" onerror="this.src='https://placehold.co/1920x600?text=Territorios+Progreso'" alt="Territorios Progreso">

        <div class="position-absolute info infoExt text-start">
            <button class="btn btn-secondary mb-3 btn-sm" data-action="history-back">
                <i class="bi bi-arrow-left me-2"></i> Volver
            </button>
            <h6 class="my-2 text-white">Territorios Progreso</h6>
            <h1 class="my-2 text-white fw-bold">{{$citydata->name}}</h1>
            <h3 class="my-2 text-white">{{$citydata->state}}</h3>
        </div>
    </div>      
</div>

<!-- HEADER MÓVIL -->
 <button class="d-block d-md-none btn btn-secondary m-3 btn-sm" data-action="history-back">
                <i class="bi bi-arrow-left me-2"></i> Volver
            </button>
<p class="m-3 mt-4 mb-1 text-blue d-block d-md-none">Territorios Progreso</p>
<h1 class="m-3 mt-1 mb-2 fw-bold fst-italic d-block d-md-none text-deepblue">
    <span class="d-block">{{$citydata->name}}</span><small>{{$citydata->state}}</small>
</h1>
<img class="d-block d-md-none img-fluid" src="/storage/{{$citydata->image}}" onerror="this.src='https://placehold.co/1920x600?text=Territorios+Progreso'" alt="Territorios Progreso">

@include('components.territory_figures')

<!-- SISTEMA DE TABS PRINCIPAL -->
<section class="container mb-5">
    <div class="tabs-container" data-aos="fade-up">
        <ul class="nav nav-tabs nav-tabs-scroll border-0" id="territoryTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="contexto-tab" data-bs-toggle="tab" data-bs-target="#contexto" type="button" role="tab">Contexto</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="porque-tab" data-bs-toggle="tab" data-bs-target="#porque" type="button" role="tab">¿Por qué estamos en este territorio?</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ruta-tab" data-bs-toggle="tab" data-bs-target="#ruta" type="button" role="tab">Ruta hacia la calidad de vida</button>
            </li>
        </ul>
        <div class="scroll-indicator-tabs d-md-none"><i class="bi bi-chevron-right"></i></div>
    </div>

    <div class="tab-content bg-white p-4 p-md-5 shadow-sm rounded-bottom-4 rounded-top-4 rounded-md-top-0 mt-3 mt-md-0" id="territoryTabsContent">
        <!-- TAB 1: CONTEXTO + MAPA INTERACTIVO -->
        <div class="tab-pane fade show active" id="contexto" role="tabpanel">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="description_text pe-md-4">
                        {!!$citydata->description!!}
                    </div>
                </div>
                <div class="col-lg-5 mt-4 mt-lg-0">
                    <div id="map" class="rounded-4 shadow-sm border" style="height: 400px; width: 100%;" data-territory-id="{{ $citydata->id ?? 4 }}" data-territory-name="{{ $citydata->name ?? '' }}"></div>
                </div>
            </div>
        </div>

        <!-- TAB 2: POR QUÉ ESTAMOS AQUÍ -->
        <div class="tab-pane fade" id="porque" role="tabpanel">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="other_data_content pe-md-4">
                        {!!$citydata->city_other_data!!}
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img class="img-fluid rounded-4 shadow-sm" src="/storage/{{$citydata->title_bg_image}}" onerror="this.src='https://placehold.co/800x600?text=Impacto+en+el+Territorio'" alt="Territorios Progreso">
                </div>
            </div>
        </div>

        <!-- TAB 3: RUTA CALIDAD DE VIDA -->
        <div class="tab-pane fade" id="ruta" role="tabpanel">
            @php
                $rutaData = [
                    'titulo' => 'Ruta hacia la calidad de vida',
                    'introduccion' => '',
                    'estrategias' => []
                ];

                switch($citydata->id) {
                    case 4: // Cartagena
                        $rutaData['introduccion'] = 'Se definieron cinco estrategias que orientan la transformación territorial, diseñadas con el propósito de desatar una mejora progresiva y sostenible de las condiciones de vida de la población.';
                        $rutaData['estrategias'] = [
                            ['t' => 'Gestión participativa del desarrollo', 'd' => 'Buscamos generar conocimiento, influencia y autonomía en la comunidad.', 'det' => 'Genera capacidades para el ejercicio de liderazgos éticos y solidarios.'],
                            ['t' => 'Educación para el ser, saber y hacer', 'd' => 'Buscamos fortalecer las competencias de los actores territoriales.', 'det' => 'Fomenta una participación respetuosa en los distintos entornos sociales.'],
                            ['t' => 'Hábitat y ambiente', 'd' => 'Intervenir físicamente el territorio para la sostenibilidad ambiental.', 'det' => 'Aborda asuntos como la movilidad, el espacio público y la formalización urbana.'],
                            ['t' => 'Construcción de sentidos compartidos', 'd' => 'Generar y promover imaginarios y creencias que contribuyan al bien común.', 'det' => 'Promueve la transformación cultural de hábitos, prácticas y actitudes.'],
                            ['t' => 'Generación de ingresos', 'd' => 'Identificar y activar oportunidades económicas rentables.', 'det' => 'Impulsa la equidad en las oportunidades de inclusión y el progreso económico.']
                        ];
                        break;
                    case 8: // Buritica
                        $rutaData['introduccion'] = 'Se definieron seis líneas estratégicas de cara a los retos de un modelo de desarrollo integral:';
                        $rutaData['estrategias'] = [
                            ['t' => 'Gestión participativa del desarrollo', 'd' => 'Generar capacidades en la comunidad para la gestión del desarrollo.', 'det' => 'Orienta la creación y fortalecimiento de formas de actuación colectiva.'],
                            ['t' => 'Formación para el saber y el hacer', 'd' => 'Educación formal para generar competencias básicas.', 'det' => 'Responde a la necesidad de mejorar la calidad educativa local.'],
                            ['t' => 'Formación en el ser', 'd' => 'Formar a la comunidad para la construcción de valores.', 'det' => 'Fortalece el tejido social desde el reconocimiento de la dignidad humana.'],
                            ['t' => 'Gestión proactiva ambiental', 'd' => 'Protección de los recursos y servicios ambientales.', 'det' => 'Contempla la protección natural ante impactos mineros y agropecuarios.'],
                            ['t' => 'Infraestructura física', 'd' => 'Intervenir físicamente el territorio para aumentar intercambios.', 'det' => 'Fundamental para dinamizar los intercambios económicos y culturales.']
                        ];
                        break;
                    case 3: // Necocli
                        $rutaData['introduccion'] = 'Se definieron seis estrategias para potenciar las capacidades existentes y las transformaciones necesarias:';
                        $rutaData['estrategias'] = [
                            ['t' => 'Generación de ingresos', 'd' => 'Aprovechar las oportunidades económicas actuales y futuras.', 'det' => 'Diseño e implementación de una plataforma de servicios financieros.'],
                            ['t' => 'Educación para el saber y el hacer', 'd' => 'Mejoramiento de la cobertura, calidad e infraestructura.', 'det' => 'Coordinación de actores del sector y fortalecimiento docente.'],
                            ['t' => 'Formación en el ser', 'd' => 'Formar a la comunidad para la construcción de valores.', 'det' => 'Fundamento de una nueva cultura basada en la ética y solidaridad.'],
                            ['t' => 'Gestión participativa del desarrollo', 'd' => 'Generar capacidades para la apropiación del desarrollo.', 'det' => 'Acción esencial para fortalecer la democracia local.'],
                            ['t' => 'Generación de sentidos compartidos', 'd' => 'Construir imaginarios colectivos para una comunidad ética.', 'det' => 'Transitar de una participación pasiva a una deliberante.'],
                            ['t' => 'Infraestructuras que soportan la vida', 'd' => 'Garantizar condiciones mínimas para el bienestar.', 'det' => 'Intervención en agua potable, saneamiento y conectividad vial.']
                        ];
                        break;
                    case 10: // Tangua
                        $rutaData['introduccion'] = 'Se definieron cinco líneas estratégicas para la transformación territorial de Tangua:';
                        $rutaData['estrategias'] = [
                            ['t' => 'Participación y acción colectiva', 'd' => 'Comunidad e instituciones empoderadas basadas en ética del cuidado.', 'det' => 'Busca modificar las relaciones entre ciudadanía e instituciones.'],
                            ['t' => 'Agua', 'd' => 'Garantizar el suministro sostenible del agua colectivamente.', 'det' => 'Incide en múltiples dimensiones del bienestar e impacto.'],
                            ['t' => 'Educación', 'd' => 'Mejorar calidad, pertinencia y acceso en el territorio rural.', 'det' => 'Motor esencial para el desarrollo humano y social.'],
                            ['t' => 'Ingresos', 'd' => 'Fortalecer oportunidades productivas para riqueza sostenible.', 'det' => 'Fomento de proyectos económicos resilientes al cambio climático.'],
                            ['t' => 'Conectividad', 'd' => 'Mejorar la conectividad vial y digital para acceso a bienes.', 'det' => 'Reduce brechas de exclusión y facilita la integración comunitaria.']
                        ];
                        break;
                    case 11: // Algeciras
                        $rutaData['introduccion'] = 'Se han definido conjuntamente cinco estrategias como ruta para la calidad de vida:';
                        $rutaData['estrategias'] = [
                            ['t' => 'Gestión participativa', 'd' => 'Fortalecer la participación e incidencia ciudadana.', 'det' => 'Genera empoderamiento y confianza institucional.'],
                            ['t' => 'Transformación cultural', 'd' => 'Generar transformaciones que fortalezcan la confianza.', 'det' => 'Pilares fundamentales para el trabajo colectivo.'],
                            ['t' => 'Educación', 'd' => 'Motor de desarrollo individual y territorial.', 'det' => 'Fortalecimiento de competencias docentes e infraestructura.'],
                            ['t' => 'Infraestructura básica habilitante', 'd' => 'Agua potable, saneamiento y conectividad vial.', 'det' => 'Mejorará el transporte y comercialización agrícola.'],
                            ['t' => 'Despensa sustentable', 'd' => 'Innovar y reconvertir actividades económicas rentables.', 'det' => 'Valoración y conservación de los ecosistemas naturales.']
                        ];
                        break;
                    case 12: // Bilbao
                        $rutaData['introduccion'] = 'Se ha establecido una ruta con cinco estrategias para una mejora progresiva:';
                        $rutaData['estrategias'] = [
                            ['t' => 'Tejido social', 'd' => 'Generar apropiación, incidencia y actuación colectiva.', 'det' => 'Superar prácticas desorganizadas mediante la corresponsabilidad.'],
                            ['t' => 'Cultura', 'd' => 'Construir confianza y solidaridad en el relacionamiento.', 'det' => 'Determinante para el bienestar frente a vulnerabilidades.'],
                            ['t' => 'Ingresos', 'd' => 'Conectar a las personas con dinámicas productivas de riqueza.', 'det' => 'Aprovechar la cercanía con el mercado laboral de Bogotá.'],
                            ['t' => 'Educación', 'd' => 'Territorio conectado con oportunidades educativas.', 'det' => 'Reduce condiciones de vulnerabilidad mediante el potencial pleno.']
                        ];
                        break;
                    case 13: // Sierra Morena
                        $rutaData['introduccion'] = 'Esta ruta responde a desafíos urbanos con fuerte vocación comunitaria:';
                        $rutaData['estrategias'] = [
                            ['t' => 'Cultura para el bien común', 'd' => 'Comunidad e instituciones trabajando por el bien común.', 'det' => 'Modifica condiciones socioculturales que limitan el desarrollo.'],
                            ['t' => 'Educación para la vida', 'd' => 'Entornos educativos garantes de bienestar y proyectos.', 'det' => 'Invertir en trayectorias de calidad para nuevas generaciones.'],
                            ['t' => 'Ingresos para el bienestar', 'd' => 'Hogares incluidos productivamente en actividades de riqueza.', 'det' => 'Fortalecer capacidades y diversificar oportunidades económicas.']
                        ];
                        break;
                    case 16: // Mesetas
                        $rutaData['introduccion'] = '';
                        $rutaData['estrategias'] = [
                            ['t' => 'Etapa de entendimiento ', 'd' => 'Mesetas, Meta', 'det' => 'En este Territorio Progreso implementaremos el modelo de calidad de vida, iniciando con una etapa de entendimiento para escuchar activamente a las comunidades y sembrar nuevas semillas de sociedad.']
                        ];
                        break;
                }
            @endphp

            @if(!empty($rutaData['estrategias']))
                <div class="row mb-4 text-center text-md-start">
                    <div class="col-12">
                        <h2 class="text-deepblue position-relative pb-3 mb-4 we_700 fw-bold fst-italic">{{ $rutaData['titulo'] }}</h2>
                        <p class="">{{ $rutaData['introduccion'] }}</p>
                    </div>
                </div>

                <div id="carouselEstrategias" class="carousel slide" data-bs-ride="false" data-bs-interval="false">
                    <div class="carousel-inner bg-white rounded-4 p-4 p-md-5 border shadow-sm">
                        @foreach($rutaData['estrategias'] as $index => $est)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row align-items-center min-vh-25">
                                <div class="col-md-5 mb-4 mb-md-0">
                                    <h3 class="text-deepblue fw-bold border-bottom border-primary pb-3">{{ $est['t'] }}</h3>
                                </div>
                                <div class="col-md-7 border-start-md ps-md-5">
                                    <p class="fw-bold text-dark mb-3">{{ $est['d'] }}</p>
                                    <p class="text-muted mb-0 small">{{ $est['det'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if(count($rutaData['estrategias']) > 1)
                    <div class="d-flex justify-content-center justify-content-md-end mt-4">
                        <button class="btn btn-primary rounded-circle me-3 btn-control shadow-sm" type="button" data-bs-target="#carouselEstrategias" data-bs-slide="prev" aria-label="Anterior">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        <button class="btn btn-primary rounded-circle btn-control shadow-sm" type="button" data-bs-target="#carouselEstrategias" data-bs-slide="next" aria-label="Siguiente">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>

<!-- SECCIÓN DE CONTENIDO SOCIAL (Noticias vs Testimonios) -->
<section class="logros_alcanzados bg-light py-5">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-12">
                <h2 class="text-deepblue h2 fw-bold mb-4">Contenidos relacionados</h2>
                
                <ul class="nav nav-pills justify-content-center mb-4" id="socialTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active me-2 px-4" id="news-tab" data-bs-toggle="tab" data-bs-target="#newsContent" type="button" role="tab">Noticias del Territorio</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4" id="testimonials-tab" data-bs-toggle="tab" data-bs-target="#testimonialsContent" type="button" role="tab">Testimonios</button>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="tab-content" id="socialTabsContent">
            <!-- PESTAÑA NOTICIAS -->
            <div class="tab-pane fade show active" id="newsContent" role="tabpanel">
                <div id="newsterritory_featured_list" class="row g-4" data-aos="fade-up">
                    @if(isset($recent_news) && count($recent_news) > 0)
                        @foreach($recent_news as $news) 
                            <div class="col-md-6 col-lg-3 mb-5">
                                <a href="{{ post_url($news->slug) }}" class="news_card_link h-100 d-block shadow-sm rounded-4 overflow-hidden">
                                    <div class="img_container"><img src="/storage/{{$news->image}}" class="w-100 object-fit-cover" height="200" alt="{{$news->title}}"></div>
                                    <div class="p-4 bg-white">
                                        <p class="text-primary small mb-2 fw-bold"><i class="bi bi-calendar-event me-1"></i> {{ $news->created_at->translatedFormat('d \d\e F \d\e Y') }}</p>
                                        <h6 class="text-deepblue fw-bold mb-4">{{$news->title}}</h6>
                                        <p class="">{{ \Illuminate\Support\Str::words($news->excerpt, 10, '...') }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center py-5 text-muted">No hay noticias registradas.</div>
                    @endif
                </div>
            </div>

            <!-- PESTAÑA TESTIMONIOS -->
            <div class="tab-pane fade" id="testimonialsContent" role="tabpanel">
                <div id="testimonial_featured_list" class="row g-4" data-aos="fade-up">
                    @if(isset($recent_testimonials) && count($recent_testimonials) > 0)
                        @foreach($recent_testimonials as $testimonial) 
                            <div class="col-md-6 col-lg-3 mb-5">
                                <a href="{{ post_url($testimonial->slug) }}" class="news_card_link h-100 d-block shadow-sm rounded-4 overflow-hidden">
                                    <div class="img_container"><img src="/storage/{{$testimonial->image}}" class="w-100 object-fit-cover" height="200" alt="{{$testimonial->title}}"></div>
                                    <div class="p-4 bg-white">
                                        <p class="text-primary small mb-2 fw-bold"><i class="bi bi-calendar-event me-1"></i> {{ $testimonial->created_at->translatedFormat('d \d\e F \d\e Y') }}</p>
                                        <h6 class="text-deepblue fw-bold mb-4">{{$testimonial->title}}</h6>
                                        <p class="">{{ \Illuminate\Support\Str::words($testimonial->excerpt, 10, '...') }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center py-5 text-muted">No hay testimonios registrados.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
