<!-- Contenedor para la Animación 3D -->
    <div id="animation-viewport">
        <canvas id="webgl-canvas"></canvas>
        <div id="content-section">
            <div class="video-card" style="background-image: linear-gradient(to top, rgba(0,0,0,0.8), transparent), url('/assets/img/video_overlay_01.jpg');" data-bs-toggle="modal" data-bs-target="#videoModal1">
                <div>
                    <h3 class="mb-3"><span class="text-blue">Como a Julia,</span> que pudo seguir adelante con su pastelería</h3>
                    <p>Conoce su historia</p>
                </div>
            </div>
            <div class="video-card" style="background-image: linear-gradient(to top, rgba(0,0,0,0.8), transparent), url('/assets/img/video_overlay_02.jpg');" data-bs-toggle="modal" data-bs-target="#videoModal2">
                <div>
                    <h3 class="mb-3"><span class="text-blue">Como a Carlos,</span> que pudo seguir adelante con su taller</h3>
                    <p>Conoce su historia</p>
                </div>
            </div>
        </div>

        <!-- Indicador de Scroll -->
        <div id="scroll-down-indicator" class="scroll-down-indicator">
            <img src="/assets/logos/slide_scroll.svg" alt="Deslizar hacia abajo">
        </div>

    </div>

    <!-- Contenido principal de la página -->
    <div id="main-content">
        <div class="container my-5">
            <!-- Título Principal -->
            <div class="text-center mb-5">
                <h1 class="main-title">Somos una Fundación que abre <br> puertas a personas <span class="text-blue">como usted</span></h1>
            </div>
            <!-- Carrusel de Imágenes -->
            <div id="fundacionCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4 mb-md-0" data-bs-toggle="modal" data-bs-target="#carouselModal1">
                                <img src="https://img.youtube.com/vi/oYUKOBE5vZ8/maxresdefault.jpg" class="d-block w-100" alt="Por qué en este Banco sí">
                                <p class="carousel-caption-custom">¿Por qué en este Banco sí?</p>
                            </div>
                            <div class="col-12 col-md-6" data-bs-toggle="modal" data-bs-target="#carouselModal2">
                                <img src="https://img.youtube.com/vi/PAfXpXRrMM8/maxresdefault.jpg" class="d-block w-100" alt="Por qué en Colmena sí">
                                <p class="carousel-caption-custom">¿Por qué en Colmena sí?</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4 mb-md-0" data-bs-toggle="modal" data-bs-target="#carouselModal3">
                                <img src="https://img.youtube.com/vi/vR28BreKqE0/maxresdefault.jpg" class="d-block w-100" alt="Aquí sí abrimos puertas">
                                <p class="carousel-caption-custom">Aquí sí abrimos puertas</p>
                            </div>
                            <div class="col-12 col-md-6" data-bs-toggle="modal" data-bs-target="#carouselModal4">
                                <img src="https://img.youtube.com/vi/-ICgJrFY_og/maxresdefault.jpg" class="d-block w-100" alt="Nuestras cámaras de seguridad captaron algo increíble!">
                                <p class="carousel-caption-custom">¡Nuestras cámaras de seguridad captaron algo increíble!</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4 mb-md-0" data-bs-toggle="modal" data-bs-target="#carouselModal5">
                                <img src="https://img.youtube.com/vi/MUZqUZw-81A/maxresdefault.jpg" class="d-block w-100" alt="¿Qué le dirías a tu “yo” del pasado">
                                <p class="carousel-caption-custom">¿Qué le dirías a tu “yo” del pasado?</p>
                            </div>
                            <div class="col-12 col-md-6" data-bs-toggle="modal" data-bs-target="#carouselModal6">
                                <img src="https://img.youtube.com/vi/-El3CeYWMZA/maxresdefault.jpg" class="d-block w-100" alt="Aquí si le abrimos las puertas a quienes quieren salir adelante">
                                <p class="carousel-caption-custom">Aquí sí le abrimos las puertas a quienes quieren salir adelante</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4 mb-md-0" data-bs-toggle="modal" data-bs-target="#carouselModal7">
                                <img src="https://img.youtube.com/vi/ojj4ykWpuo0/maxresdefault.jpg" class="d-block w-100" alt="Un sí lo cambió todo">
                                <p class="carousel-caption-custom">Un sí lo cambió todo</p>
                            </div>
                            <div class="col-12 col-md-6" data-bs-toggle="modal" data-bs-target="#carouselModal8">
                                <img src="https://img.youtube.com/vi/2TsmpXfhF78/maxresdefault.jpg" class="d-block w-100" alt="Aquí sí abrimos puertas">
                                <p class="carousel-caption-custom">Aquí sí abrimos puertas</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#fundacionCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Anterior</span></button>
                <button class="carousel-control-next" type="button" data-bs-target="#fundacionCarousel" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Siguiente</span></button>
            </div>
        </div>
        <div class="container my-5 py-5">
            <div class="text-center mb-5">
                <h2 class="section-title">Y abrimos puertas con <br> <span class="text-blue"> nuestras empresas</span></h2>
            </div>
            <div class="row gy-5 gx-4 justify-content-center align-items-center text-center">
                <div class="col-6 col-md-4 col-lg-3"><img src="/assets/logos/logo_bcs.svg" alt="Logo Banco Caja Social" class="img-fluid company-logo"></div>
                <div class="col-6 col-md-4 col-lg-3"><img src="/assets/logos/logo_fcs.svg" alt="Logo Fiduciaria Caja Social" class="img-fluid company-logo"></div>
                <div class="col-6 col-md-4 col-lg-3"><img src="/assets/logos/logo_cs.svg" alt="Logo Colmena Seguros" class="img-fluid company-logo"></div>
                <div class="col-6 col-md-4 col-lg-3"><img src="/assets/logos/logo_ea.svg" alt="Logo entre amigos" class="img-fluid company-logo"></div>
                <div class="col-6 col-md-4 col-lg-3"><img src="/assets/logos/logo_d.svg" alt="Logo DECO" class="img-fluid company-logo"></div>
                <div class="col-6 col-md-4 col-lg-3"><img src="/assets/logos/logo_s.svg" alt="Logo SERVIR" class="img-fluid company-logo"></div>
                <div class="col-6 col-md-4 col-lg-3"><img src="/assets/logos/logo_g.svg" alt="Logo GESTORA" class="img-fluid company-logo"></div>
            </div>
        </div>
        <div class="container my-5">
            <div class="cta-section text-white p-5">
                <div class="row align-items-center justify-content-center text-center text-md-start">
                    <div class="col-md-7 mb-4 mb-md-0">
                        <p class="cta-text text-white"><span class="badge badge-primary me-4">Conoce aquí</span>cómo abrimos muchas más puertas</p>
                    </div>
                    <div class="col-md-5 text-center text-md-end">
                        <img src="/assets/logos/logo_fgs_w.svg" alt="Logo Fundación Grupo Social" class="img-fluid cta-logo">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modales de Video (Overlay) -->
    <div class="modal fade modal-video" id="videoModal1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/2Nfa8my_0hI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-video" id="videoModal2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                 <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/1Lt9XNjInYg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modales de Video (Carrusel) -->
    <div class="modal fade modal-video" id="carouselModal1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/oYUKOBE5vZ8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-video" id="carouselModal2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                 <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/PAfXpXRrMM8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-video" id="carouselModal3" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/vR28BreKqE0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-video" id="carouselModal4" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                 <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/-ICgJrFY_og" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-video" id="carouselModal5" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/MUZqUZw-81A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-video" id="carouselModal6" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                 <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/-El3CeYWMZA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-video" id="carouselModal7" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/ojj4ykWpuo0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-video" id="carouselModal8" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                 <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/2TsmpXfhF78" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Three.js importmap + module loaded via @push('scripts') in because.blade.php -->
