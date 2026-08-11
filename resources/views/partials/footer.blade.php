<footer class="fgs_footer position-relative">
<div class="container py-5">

        <div class="row justify-content-between">

            <!-- Conócenos -->
            <div class="col-12 col-lg-2 footer-column">

                <h6
                    class="footer-title"
                    data-bs-toggle="collapse"
                    data-bs-target="#footerConocenos"
                    aria-expanded="false">
                    Conócenos
                    <span class="footer-arrow d-lg-none">+</span>
                </h6>

                <ul id="footerConocenos" class="list-unstyled collapse d-lg-block">
                    @foreach(\App\Support\Cms::navItems('front_footer_left') as $navItem)
                        <li><a href="{{ $navItem->url }}">{{ $navItem->title }}</a></li>
                    @endforeach
                </ul>

            </div>

            <!-- Nuestras empresas -->
            <div class="col-12 col-lg-2 footer-column">

                <h6
                    class="footer-title"
                    data-bs-toggle="collapse"
                    data-bs-target="#footerEmpresas"
                    aria-expanded="false">
                    Nuestras empresas
                    <span class="footer-arrow d-lg-none">+</span>
                </h6>

                <ul id="footerEmpresas" class="list-unstyled collapse d-lg-block">
                    <li><a href="https://inversora.fundaciongruposocial.co/" target="_blank">Inversora Fundación Grupo Social</a></li>
                    <li><a href="https://www.bancocajasocial.com/" target="_blank">Banco Caja Social</a></li>
                    <li><a href="https://www.fiduciariacajasocial.com/" target="_blank">Fiduciaria Caja Social</a></li>
                    <li><a href="https://www.entreamigos.co/" target="_blank">Entre Amigos</a></li>
                    <li><a href="https://www.colmenaseguros.com/" target="_blank">Colmena Seguros</a></li>
                    <li><a href="#">DECO</a></li>
                    <li><a href="https://www.gestora.co/" target="_blank">Gestora de proyectos empresariales</a></li>
                    <li><a href="/nuestras-empresas">Conoce todas nuestras empresas</a></li>
                </ul>

            </div>

            <!-- Territorios -->
            <div class="col-12 col-lg-2 footer-column">

                <h6
                    class="footer-title"
                    data-bs-toggle="collapse"
                    data-bs-target="#footerTerritorios"
                    aria-expanded="false">
                    Nuestros Territorios Progreso
                    <span class="footer-arrow d-lg-none">+</span>
                </h6>

                <ul id="footerTerritorios" class="list-unstyled collapse d-lg-block">

                    @php
                        $cities = \App\Support\Cms::entries('territories', fn ($q) => $q->where('active', true))->sortByDesc('id')->values();
                    @endphp

                    @foreach ($cities as $ct)
                        <li>
                            <a href="/nuestros-territorios-progreso/{{ $ct->slug }}">
                                {{ $ct->name }}
                            </a>
                        </li>
                    @endforeach

                    <li>
                        <a href="/nuestros-territorios-progreso/">
                            Conoce nuestros Territorios Progreso
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Información usuario -->
            <div class="col-12 col-lg-2 footer-column">

                <h6
                    class="footer-title"
                    data-bs-toggle="collapse"
                    data-bs-target="#footerUsuario"
                    aria-expanded="false">
                    Información para el usuario
                    <span class="footer-arrow d-lg-none">+</span>
                </h6>

                <ul id="footerUsuario" class="list-unstyled collapse d-lg-block">
                    <li><a href="/informe-labores">Informe de labores</a></li>
                    <li><a href="/informes-labores-empresas">Informes de labores Empresas</a></li>
                    <li><a href="/contactenos">Contacto</a></li>
                    <li><a href="/storage/documents/FGS-Codigo-Gobierno.pdf" target="_blank">Código de Gobierno</a></li>
                    <li><a href="/preguntas-frecuentes">Preguntas Frecuentes</a></li>
                    <li><a href="/linea-de-transparencia">Línea de transparencia</a></li>
                    <li><a href="/storage/documents/FGS-Politica-Proteccion-Datos-Personales.pdf" target="_blank">Políticas de Protección de Datos Personales</a></li>
                    <li><a href="/storage/documents/FGS-Aviso-de-Privacidad.pdf" target="_blank">Aviso de Privacidad</a></li>
                    <li><a href="/storage/documents/FGS_entidades_organizacion.pdf" target="_blank">Entidades que hacen parte de la Organización</a></li>
                    <li><a href="/documentos" target="_blank">Documentos Régimen Tributario Especial</a></li>
                </ul>

            </div>

            <!-- Redes sociales -->
            <div class="col-12 col-lg-2 footer-column social-icons">

                <h6
                    class="footer-title"
                    data-bs-toggle="collapse"
                    data-bs-target="#footerSocial"
                    aria-expanded="false">
                    Redes Sociales
                    <span class="footer-arrow d-lg-none">+</span>
                </h6>

                <div id="footerSocial" class="collapse d-lg-block">

                    @php
                        $socialLinks = \App\Support\Cms::entries('social_links', fn ($q) => $q->orderBy('order'));
                    @endphp

                    @if(count($socialLinks) > 1)
                        @foreach($socialLinks as $socialLink)
                            <a href="{{ $socialLink->website }}" target="_blank" class="d-block mb-2">
                                <i class="bi bi-{{ $socialLink->class }}"></i>
                                {{ $socialLink->class }}
                            </a>
                        @endforeach
                    @endif

                </div>

            </div>

        </div>

        <div class="footer-bottom">

            <svg class="d-inline" xmlns="http://www.w3.org/2000/svg" width="40.381" height="37.595" viewBox="0 0 40.381 37.595">
				<path id="Path_64" data-name="Path 64" d="M639.657,196.379l-20.209.005a1.2,1.2,0,0,0-1.029.588l-10.455,17.745a1.194,1.194,0,0,0,0,1.215l10.356,17.454a1.193,1.193,0,0,0,1.026.584l20.286,0a1.193,1.193,0,0,0,1.036-.6l7.215-12.59a1.194,1.194,0,0,0,0-1.191l-10.141-17.525a1.2,1.2,0,0,0-1.035-.6l-14.344.02a1.194,1.194,0,0,0-1.027.589l-7.446,12.646a1.2,1.2,0,0,0,0,1.215l7.333,12.36a1.193,1.193,0,0,0,1.028.585l14.424-.016a1.194,1.194,0,0,0,1.035-.6l3.473-6.075h0l1.213-2.127-2.121-3.447-.957,1.669-.047.071-3.621,6.327a1.194,1.194,0,0,1-1.035.6l-10.31.007a1.193,1.193,0,0,1-1.027-.584l-5.213-8.775a1.193,1.193,0,0,1,0-1.216l5.335-9.049a1.2,1.2,0,0,1,1.028-.588H634.66a1.193,1.193,0,0,1,1.034.6l8.042,13.913a1.193,1.193,0,0,1,0,1.19l-5.139,9a1.194,1.194,0,0,1-1.037.6H621.394a1.193,1.193,0,0,1-1.026-.585l-8.225-13.854a1.192,1.192,0,0,1,0-1.216l8.354-14.168a1.194,1.194,0,0,1,1.029-.588h16.06a1.194,1.194,0,0,1,1.034.6l6.459,11.19.013.019,1.028,1.778,2.062-3.6-.325-.564-.016-.034-.972-1.684-.388-.673h0l-5.787-10.022a1.194,1.194,0,0,0-1.033-.6h0" transform="translate(-607.799 -196.379)" fill="#163863"/>
				</svg>

            <p class="ms-3 d-inline">
                © {{ date('Y') }} - Fundación Grupo Social |
                Todos los derechos reservados |
                Dirección: Calle 72 N° 10 – 71 |
                Teléfono: (571) – 5953810 ext 15979 |
                Bogotá, Colombia
            </p>

        </div>

    </div>
</footer>

<!-- Video Modal -->
<div class="modal-video" id="videoModal">
    <div class="modal-video-content">
        <button type="button" class="btn-close modal-video-close" aria-label="Close" data-action="close-video"></button>
        <!-- Embedded YouTube Video -->
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" id="videoIframe" allowfullscreen></iframe>
        </div>
    </div>
</div>