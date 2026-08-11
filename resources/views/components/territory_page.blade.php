<section id="bread-crumb">
    <div class="container-fluid">
        <div class="row">
            <div class="col py-2 px-4">
                <p><a href="/" class="text-decoration-none text-secondary">Inicio</a> <span class="text-muted mx-1">-</span> <a href="/nuestros-territorios-progreso/" class="text-decoration-none text-dark fw-bold">Nuestros Territorios Progreso</a></p>
            </div>
        </div>
    </div>
</section>

<!-- BANNER PRINCIPAL -->
<div class="highlighted_banner position-relative d-none d-md-block" data-aos="fade-up" data-aos-duration="1000">
    <div class="position-relative content h-100">
        <img class="object-fit-cover" src="/storage/{{$citydata->image}}" onerror="this.src='https://placehold.co/1920x600?text=Territorios+Progreso'" alt="Territorios Progreso">

        <div class="position-absolute info infoExt text-start">
            <button class="btn btn-secondary mb-3 btn-sm shadow-sm" data-action="history-back">
                <i class="fas fa-arrow-left me-2"></i> Volver
            </button>
            <h6 class="my-2 text-white" style="letter-spacing: 2px; opacity: 0.9;">Territorios Progreso</h6>
            <h1 class="my-2 text-white fw-bold display-4">{{$citydata->name}}</h1>
            <h3 class="my-2 text-white">{{$citydata->state}}</h3>
        </div>
    </div>      
</div>

<!-- HEADER MÓVIL -->
<button class="d-block d-md-none btn btn-secondary m-3 btn-sm shadow-sm" data-action="history-back">
    <i class="fas fa-arrow-left me-2"></i> Volver
</button>
<p class="m-3 mt-4 mb-1 text-blue d-block d-md-none text-uppercase" style="letter-spacing: 1px;">Territorios Progreso</p>
<h1 class="m-3 mt-1 mb-2 fw-bold fst-italic d-block d-md-none text-deepblue">
    <span class="d-block">{{$citydata->name}}</span><small class="fs-5 text-muted fst-normal">{{$citydata->state}}</small>
</h1>
<img class="d-block d-md-none img-fluid rounded-bottom-4 shadow-sm mb-4" src="/storage/{{$citydata->image}}" onerror="this.src='https://placehold.co/1920x600?text=Territorios+Progreso'" alt="Territorios Progreso">

<!-- SECCIÓN DE CIFRAS (CON BENTO GRID Y DISEÑO ESTÁTICO) -->
<section class="container my-5 cifra_section">
    <div class="bento-grid" data-aos="fade-up">
        
        <!-- Item 1: Territorio (Azul) -->
        <div class="kpi-card theme-blue hover-lift bento-tl">
            <div class="kpi-header">
                <i class="bi bi-map-fill kpi-icon"></i>
                <h3 class="kpi-title">Territorio</h3>
            </div>
            <div class="kpi-body">
                <p class="kpi-desc">{{$citydata->territory}}</p>
            </div>
        </div>

        <!-- Item 2: Datos Clave (Amarillo) -->
        <div class="kpi-card theme-yellow hover-lift bento-top-flat">
            <div class="kpi-header">
                <i class="bi bi-clipboard-data-fill kpi-icon"></i>
                <h3 class="kpi-title">Datos clave</h3>
            </div>
            <div class="kpi-body">
                <p class="kpi-desc">{{$citydata->looking_for}}</p>
            </div>
        </div>

        <!-- Item 3: Habitantes (Azul Claro) -->
        <div class="kpi-card theme-light-blue hover-lift bento-tr">
            <div class="kpi-header">
                <i class="bi bi-people-fill kpi-icon"></i>
                <h3 class="kpi-title">Habitantes</h3>
            </div>
            <div class="kpi-body">
                <div class="kpi-desc">{!!$citydata->habitantes!!}</div>
            </div>
        </div>

    </div>
</section>

<!-- SECCIÓN DE INFO Y CIFRAS INTERACTIVAS -->
<section class="bg-white community_unit_section py-5">   
    <div class="container-fluid px-4 px-lg-5">
        <div class="row justify-content-center align-items-center">
            
            <!-- Columna Izquierda: Textos de Descripción -->
            <div class="col-lg-10 mb-5 mb-lg-0">
                
                    <p class="mb-4">{{$citydata->description}}</p>
                    <p>{!!$citydata->city_other_data!!}</p>
                
            </div>
            

        </div>
    </div>  
</section>

<!-- SECCIÓN TESTIMONIOS/NOTICIAS -->
@if (count($recent_testimonials) > 0)
    <section class="logros_alcanzados co actuamos bg_white padding_bottom_zero new_carta py-5 bg-light">
        <div class="container-fluid">
            <div class="inner_text left_right_padding_80 text-center mb-5" data-aos="fade-up">
                <h2 class="oswaldfonts position-relative text-deepblue fst-italic fw-bold mx-auto" style="max-width: 800px;">
                    Si quiere conocer más sobre el desarrollo de las líneas estratégicas definidas, lo invitamos a consultar las siguientes noticias de nuestro acompañamiento en <span class="text-warning">{{$citydata->name}}:</span>
                </h2>
            </div>
        </div> 

        <div class="container" data-aos="fade-up" data-aos-delay="200">
            <div class="row g-4 mb-5" id="testimonial_featured_list">
                @foreach($recent_testimonials as $testimonial) 
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ post_url($testimonial->slug) }}" class="card h-100 text-decoration-none border-0 shadow-sm hover-lift rounded-4 overflow-hidden">
                            <div class="img_container position-relative" style="height: 220px;">
                                <img src="/storage/{{$testimonial->image}}" class="w-100 h-100 object-fit-cover" alt="{{$testimonial->title}}" title="{{$testimonial->title}}">
                            </div>
                            <div class="card-body p-4 bg-white">
                                <p class="text-primary small fw-bold mb-2"><i class="bi bi-calendar-event me-1"></i> {{$testimonial->created_at}}</p>
                                <h5 class="card-title text-deepblue fw-bold mb-3">{{$testimonial->title}}</h5>
                                <p class="card-text text-secondary mb-0">{{$testimonial->excerpt}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- TERRITORIOS ACTUALES -->
<div class="container mt-5">
    <div class="row justify-content-center">   
        <div class="col-12 col-lg-12 d-flex align-items-center" data-aos="fade-up">
            <div>
                <h3 class="py-4 my-4 text-deepblue position-relative colored_lines fw-bold">Territorios Progreso Actuales:</h3>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mb-5 p-0">
    <div class="territorios">
        @foreach ($cities as $ct)
            <div class="program_box zoomeffice mx-2 d-inline-block">
                <a href="/nuestros-territorios-progreso/{{$ct->slug}}" style="text-decoration:none; color:#FFF">
                    <div class="position-relative height300 white_text_color oswaldfonts">
                        <div class="height_widht_over">
                            <img class="object_fit_cover rounded-4" src="/storage/{{$ct->listing_image}}" width="560" height="300" />
                        </div>
                        <h4 class="hover-title">{{$ct->name}}<br>
                        <small>{{$ct->state}}</small></h4>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<!-- TERRITORIOS FINALIZADOS -->
<div class="container mt-5">
    <div class="row justify-content-center">   
        <div class="col-12 col-lg-12 d-flex align-items-center pb-4" data-aos="fade-up">
            <div>
                <h3 class="py-4 my-4 text-deepblue position-relative colored_lines fw-bold">Territorios Progreso en los que finalizamos acompañamiento:</h3>
                <p class="text-secondary fs-5">Después de concluir nuestro acompañamiento en estos Territorios Progreso, ellos continúan generando alianzas y trabajando en equipo por quienes no han tenido suficientes oportunidades para progresar.</p>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5 p-0">
    <div class="territorios-old">
        @foreach ($cities_old as $ct)
            <div class="program_box zoomeffice mx-2 d-inline-block">
                <a href="/nuestros-territorios-progreso/{{$ct->slug}}" style="text-decoration:none; color:#FFF">
                    <div class="position-relative height300 white_text_color oswaldfonts">
                        <div class="height_widht_over">
                            <img class="object_fit_cover rounded-4" src="/storage/{{$ct->listing_image}}" width="560" height="300" />
                        </div>
                        <h4 class="hover-title">{{$ct->name}}<br>
                        <small>{{$ct->state}}</small></h4>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>