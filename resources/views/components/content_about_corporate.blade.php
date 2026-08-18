@include('partials.breadcrumb', ['items' => [['label' => 'Conócenos', 'url' => '/conocenos/quienes-somos'], ['label' => 'Asuntos corporativos']]])

@include('menu.mega_about')

<!-- BANNER PRINCIPAL -->
<div class="highlighted_banner position-relative d-none d-md-block" data-aos="fade-up" data-aos-duration="1000">
    <div class="position-relative content">
        <img class="object-fit-cover" src="/assets/img/2026/2026_01_conocenos_header_asuntos.jpg" onerror="this.src='https://placehold.co/1920x600?text=Asuntos+Corporativos'" alt="Asuntos Corporativos">

        <div class="position-absolute info infoExt text-start">
            <a class="btn btn-secondary mb-3" data-action="history-back" href="#">Volver</a>
            <h1 class="my-2 text-white fw-bold">Asuntos Corporativos</h1>
        </div>
    </div>      
</div>

<h1 class="m-3 mt-4 mb-2 fw-bold fst-italic d-block d-md-none"><span class="text-deepblue">Asuntos Corporativos</span></h1>

<div class="container py-md-2 py-2">

    <!-- SECCIÓN: PUNTOS DE ACCESO -->
    <section class="my-5" data-aos="fade-up">
        <div class="row justify-content-center g-4">
            
            <!-- 1. Código de Gobierno -->
            <div class="col-md-4">
                <a href="/storage/documents/FGS-Codigo-Gobierno.pdf" target="_blank" class="text-decoration-none">
                    <div class="access-card card-governance">
                        <div class="card-icon-wrapper display-4">
                            <!-- Icono: Banco/Institución para Gobierno -->
                            <i class="bi bi-bank"></i>
                        </div>
                        <h3 class="card-title">Código de Gobierno</h3>
                        <p class="text-muted mb-4 small">
                            Lineamientos éticos y directrices que rigen nuestra toma de decisiones y conducta empresarial.
                        </p>
                        <span class="card-action">Consultar <i class="bi bi-arrow-right ms-2"></i></span>
                    </div>
                </a>
            </div>

            <!-- 2. Línea de Transparencia -->
            <div class="col-md-4">
                <a href="/linea-de-transparencia" class="text-decoration-none">
                    <div class="access-card card-transparency">
                        <div class="card-icon-wrapper display-4">
                            <!-- Icono: Megáfono para Transparencia/Denuncia -->
                            <i class="bi bi-megaphone"></i>
                        </div>
                        <h3 class="card-title">Línea de Transparencia</h3>
                        <p class="text-muted mb-4 small">
                            Canal seguro y confidencial para reportar situaciones que vayan en contra de nuestros principios éticos.
                        </p>
                        <span class="card-action">Acceder <i class="bi bi-arrow-right ms-2"></i></span>
                    </div>
                </a>
            </div>

            <!-- 3. Documentación Corporativa -->
            <div class="col-md-4">
                <a href="/asuntos-corporativos/documentacion" class="text-decoration-none">
                    <div class="access-card card-docs">
                        <div class="card-icon-wrapper display-4">
                            <!-- Icono: Carpeta abierta para Documentación -->
                            <i class="bi bi-folder2-open"></i>
                        </div>
                        <h3 class="card-title">Documentación Corporativa</h3>
                        <p class="text-muted mb-4 small">
                            Repositorio de informes, estatutos, políticas y otros documentos de interés público.
                        </p>
                        <span class="card-action">Ver Documentos <i class="bi bi-arrow-right ms-2"></i></span>
                    </div>
                </a>
            </div>

        </div>
    </section>

</div>