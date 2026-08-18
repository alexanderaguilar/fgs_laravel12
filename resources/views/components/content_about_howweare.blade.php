@include('partials.breadcrumb', ['items' => [['label' => 'Conócenos', 'url' => '/conocenos/quienes-somos'], ['label' => 'Cómo somos']]])

@include('menu.mega_about')

<!-- BANNER PRINCIPAL -->
<div class="highlighted_banner position-relative d-none d-md-block" data-aos="fade-up" data-aos-duration="1000">
    <div class="position-relative content">
        <img class="object-fit-cover" src="/assets/img/2026/2026_01_conocenos_header_como.jpg" onerror="this.src='https://placehold.co/1920x600?text=Como+Somos'" alt="Como somos">

        <div class="position-absolute info infoExt text-start">
            <a class="btn btn-secondary mb-3" data-action="history-back" href="#">Volver</a>
            <h1 class="my-2 text-white fw-bold">¿Cómo somos?</h1>
        </div>
    </div>      
</div>

<h1 class="m-3 mt-4 mb-2 fw-bold fst-italic d-block d-md-none"><span class="text-deepblue">¿Cómo somos?</span></h1>

<div class="container py-md-2 py-2">

    <!-- SECCIÓN: INTRODUCCIÓN -->
    <section class="mb-5" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-start"> 
                <h3 class="highlighted_title fw-bold fst-italic mt-5">Cinco puntos para conocer a Fundación Grupo Social</h3>
                <p class="mt-3">
                    Creemos que todas las personas tienen las capacidades para salir adelante y que una
puerta abierta lo cambia todo. Por eso, asumimos un compromiso profundo con el
progreso y bienestar de personas y comunidades, especialmente de las que siempre las
han encontrado cerradas.
                </p>
                <h5 class="highlighted_title fw-bold fst-italic mt-3 text-deepblue">
                    Así es como somos, es lo que nos define y nos guía. Es la forma en que vivimos el
propósito que nos inspira desde hace más de un siglo.
                </h5>
            </div>
        </div>
    </section>

    <!-- SECCIÓN DE TABS CON SCROLL -->
    <section class="mb-5" data-aos="fade-up">
        
        <div class="tabs-container">
            <!-- Flecha indicadora de scroll -->
            <div class="scroll-indicator-tabs" id="tabArrow">
                <i class="bi bi-arrow-right-short"></i>
            </div>
            
            <!-- Navegación de Tabs -->
            <ul class="nav nav-tabs nav-tabs-scroll" id="tabSub" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab1" data-bs-toggle="tab" data-bs-target="#content1" type="button" role="tab" aria-controls="content1" aria-selected="true">Trabajamos con comunidades</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab2" data-bs-toggle="tab" data-bs-target="#content2" type="button" role="tab" aria-controls="content2" aria-selected="false">Tenemos un Legado centenario</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab3" data-bs-toggle="tab" data-bs-target="#content3" type="button" role="tab" aria-controls="content3" aria-selected="false">Somos una fundación dueña de empresas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab4" data-bs-toggle="tab" data-bs-target="#content4" type="button" role="tab" aria-controls="content4" aria-selected="false">Somos una entidad promocional</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab5" data-bs-toggle="tab" data-bs-target="#content5" type="button" role="tab" aria-controls="content5" aria-selected="false">Nuestra inspiración es católica</button>
                </li>
            </ul>
        </div>

        <!-- Contenido de Tabs -->
        <div class="tab-content pt-2" id="tabSubContent">
            
            <!-- TAB CONTENT 1: Trabajamos con comunidades -->
            <div class="tab-pane fade show active" id="content1" role="tabpanel" aria-labelledby="tab1">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 mb-4 mb-md-0 text-center">
                        <img src="/assets/img/2026/2026_01_conocenos_como_tab_1.jpg" class="img-fluid rounded-20 shadow-lg" alt="Trabajo con comunidades">
                    </div>
                    <div class="col-md-4">
                        <p class="mb-3">Llevamos más de 100 años trabajando al lado de comunidades al margen del desarrollo,
que son hoy nuestros Territorios Progreso. Allí, buscamos un mejoramiento integral de la
calidad de vida y que sean las mismas comunidades las que promuevan su desarrollo.</p>
                        <p class="mb-3">Nos hacemos parte de la comunidad por largo tiempo y desarrollamos junto con sus
habitantes un trabajo que no está orientado a regalar cosas, ni a dar fórmulas para el
cambio, sino a aprender conjuntamente a conseguirlas a partir de las capacidades de las
personas y de los retos y oportunidades de cada territorio.</p>
                    </div>
                </div>
            </div>

            <!-- TAB CONTENT 2: Legado centenario -->
            <div class="tab-pane fade" id="content2" role="tabpanel" aria-labelledby="tab2">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <p class="mb-3">Llevamos más de un siglo trabajando para mejorar la vida de las personas, es nuestro
único propósito. Es un Legado que ha pasado de generación en generación y que hoy, las
más de 12.500 personas que integran la organización reciben para juntos abrir cada vez
más puertas de progreso, bienestar e inclusión en el país.</p>
                    </div>
                </div>

                <div class="row justify-content-center">   
                    <div class="col-md-5 col-sm-5 col-12 box_col aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <a href="/conocenos/historia">
                            <div class="position-relative zoomeffice">
                                <div class="overlay_layer_gray position-absolute"> </div>
                                <div class="height_widht_over">
                                    <img class="object_fit_cover" src="/assets/img/2026/2026_01_conocenos_como_tab_2_1.jpg" width="420" height="300">
                                </div>
                                <div class="position-absolute text-white diferent_position">
                                    <h3 class="text-white we_700">Historia</h3>
                                </div>
                            </div>
                        </a>   
                    </div>

                    <div class="col-md-5 col-sm-5 col-12 box_col aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <a href="/storage/general/LEGADO_FUNDACION_GRUPO_SOCIAL.pdf" target="_blank">
                            <div class="position-relative zoomeffice">
                                <div class="overlay_layer_gray position-absolute"> </div>
                                <div class="height_widht_over">
                                    <img class="object_fit_cover" src="/assets/img/2026/2026_01_conocenos_como_tab_2_2.jpg" width="420" height="300">
                                </div>
                                <div class="position-absolute text-white diferent_position">
                                    <h3 class="text-white we_700">Legado</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>

            <!-- TAB CONTENT 3: Fundación dueña de empresas -->
            <div class="tab-pane fade" id="content3" role="tabpanel" aria-labelledby="tab3">
                <div class="row justify-content-center">
                    <div class="col-md-6 mb-4 mb-md-0 text-center">
                        <img src="/assets/img/2026/2026_01_conocenos_como_tab_4.jpg" class="img-fluid rounded-20 shadow-lg" alt="Fundación dueña de empresas">
                    </div> 
                    <div class="col-lg-4">
                        <p class="">Desde que nuestro fundador tuvo la convicción que, por medio del ahorro, las personas
menos favorecidas podían salir adelante, hemos creado empresas que abren puertas de
progreso e inclusión, principalmente a quienes no han sido atendidos adecuadamente por
la oferta tradicional.</p>
                        <p class="my-3">Nuestras empresas son parte fundamental de la actuación social que desarrollamos. No
son meras financiadoras de la obra social. Ellas son obras sociales en sí mismas y a partir
de estas, satisfacemos verdaderas necesidades, especialmente a esos colombianos que
tanto lo requieren.</p>
                        <p class="">Hoy tenemos presencia en sectores que tienen la capacidad de generar desarrollo,
inclusión y transformación social como el financiero, de ahorro y crédito; protección;
constructor; y turismo.</p>
                    </div>
                </div>
            </div>

             <!-- TAB CONTENT 4: Entidad promocional -->
            <div class="tab-pane fade" id="content4" role="tabpanel" aria-labelledby="tab4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5 mb-4 mb-md-0 text-center">
                        <img src="/assets/img/2026/2026_01_conocenos_como_tab_5.jpg" class="img-fluid rounded-20 shadow-lg" alt="Entidad Promocional">
                    </div>
                    <div class="col-md-5 mt-4">
                        <p class="">Tenemos un enfoque promocional, que busca que las personas por y con las que
trabajamos fortalezcan sus capacidades para ser autónomos y participativos, gestores y
protagonistas de su propio desarrollo.</p>
                    </div>
                </div>
            </div>

            <!-- TAB CONTENT 5: Inspiración católica -->
            <div class="tab-pane fade" id="content5" role="tabpanel" aria-labelledby="tab5">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-10 text-center">
                        <p class="mt-3" style="font-weight: 400;line-height: 1.3em;">Nos guiamos <span class="fw-bold">por la fe católica</span> desde el día en que el Padre José María Campoamor S.J.
creó esta institución, la cual <span class="fw-bold">está consagrada a la Virgen Inmaculada y a San Francisco
Javier</span>. Desde esta visión nos relacionamos con la sociedad, respetando siempre la
libertad de credos.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
