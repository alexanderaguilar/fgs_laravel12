@include('partials.breadcrumb', ['items' => [['label' => 'Conócenos', 'url' => '/conocenos/quienes-somos'], ['label' => 'Quiénes somos']]])

@include('menu.mega_about')

<!-- BANNER PRINCIPAL -->
<div class="highlighted_banner position-relative d-none d-md-block" data-aos="fade-up" data-aos-duration="1000">
    <div class="position-relative content">
        <img class="object-fit-cover" src="/assets/img/2026/2026_01_conocenos_header_quienes.jpg" onerror="this.src='https://placehold.co/1920x600?text=Quienes+Somos'" alt="Quiénes somos">

        <div class="position-absolute info infoExt text-start">
            <a class="btn btn-secondary mb-3" data-action="history-back" href="#">Volver</a>
            <h1 class="my-2 text-white fw-bold">¿Quiénes somos?</h1>
        </div>
    </div>      
</div>

<h1 class="m-3 mt-4 mb-2 fw-bold fst-italic d-block d-md-none"><span class="text-deepblue">¿Quiénes somos?</span></h1>

<div class="container py-md-2 py-2">

    <!-- SECCIÓN: INTRODUCCIÓN -->
    <section class="mb-5" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-start">
                <h5 class="highlighted_title fw-bold fst-italic mt-5 mb-3">
                    Desde hace más de un siglo trabajamos por una sociedad con más oportunidades,
especialmente para quienes menos han tenido.
                </h5>
                <p class="">
                    Creemos en el potencial de las personas y comunidades y estamos comprometidos a
abrir puertas y caminar a su lado para impulsar su progreso y bienestar y así construir la
sociedad que soñamos, una sociedad más ética, basada en la solidaridad e inspirada en
valores que privilegian el bien común.
                </p>
            </div>
        </div>
    </section>

    <!-- SECCIÓN DE TABS (Misión y Modelo) -->
    <section class="mb-5" data-aos="fade-up">
        
        <!-- Navegación de Tabs -->
        <ul class="nav nav-tabs justify-content-center mb-5" id="tabSub" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="mision-tab" data-bs-toggle="tab" data-bs-target="#mision" type="button" role="tab" aria-controls="mision" aria-selected="true">Misión</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="modelo-tab" data-bs-toggle="tab" data-bs-target="#modelo" type="button" role="tab" aria-controls="modelo" aria-selected="false">Modelo de gestión</button>
            </li>
        </ul>

        <!-- Contenido de Tabs -->
        <div class="tab-content" id="tabSubContent">
            
            <!-- TAB CONTENT: MISIÓN -->
            <div class="tab-pane fade show active" id="mision" role="tabpanel" aria-labelledby="mision-tab">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-4 mb-4 mb-md-0 text-center">
                        <img src="/assets/img/2026/2026_quienes_somos_campoamor_index.jpg" class="img-fluid rounded-20 shadow-lg" alt="Misión">
                    </div>
                    <div class="col-md-4">
                        <h5 class="highlighted_title fw-bold fst-italic mt-5 mb-3">
                            Contribuir a superar las causas estructurales de la pobreza para construir una sociedad
justa, solidaria, productiva y en paz.</h5>
                    </div>
                </div>
            </div>

            <!-- TAB CONTENT: MODELO DE GESTIÓN -->
            <div class="tab-pane fade" id="modelo" role="tabpanel" aria-labelledby="modelo-tab">
                <div class="row justify-content-center">
                    <div class="col-lg-10 d-flex justify-content-center">
                        <p class="mb-4">La Fundación actúa de cara a la sociedad a través de sus dos instrumentos: los Territorios
Progreso y las Empresas para el Bien Común. El tercer elemento, su cultura
organizacional es el aglutinante que da coherencia, consistencia y sostenibilidad a toda la
gestión.</p>
                    </div>
                    <div class="col-lg-10 d-flex justify-content-center">
                        <img src="/assets/img/2025/2025_modelo_gestion_desktop.svg" alt="Su actuación social" class="img-fluid d-none d-md-block">
                        <img src="/assets/img/2025/2025_modelo_gestion_mobile.svg" alt="Su actuación social" class="img-fluid d-block d-md-none">
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>