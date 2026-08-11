<footer>
    <div class="top_footer d-none-767">
        <div class="container-fluid">
            <div class="left_right_padding_40">
                <ul class="left_menu robotfonts">
                    <li><a target="_self" href="/quienes-somos">About us</a></li>
                    <li class="sepeter">|</li>
                    <li><a target="_self" href="/noticias">News</a></li>
                    <li class="sepeter">|</li>
                    <li><a target="_self" href="/contactenos">Contact us</a></li>
                </ul>
                <ul class="left_menu right_menu robotfonts">
                    <li><a target="_self" href="/informacion-general">Related information</a></li>
                    <li><a target="_blank" href="https://trabajaconnosotros.fundaciongruposocial.co/" rel="noopener noreferrer">Work with us</a></li>
                </ul>
                <ul class="left_menu top_border position-relative"></ul>
            </div>
        </div>
    </div>
    <div class="bottom_footer bg_white">
        <div class="container-fluid">
            <div class="left_right_padding_40">
                <div class="d-flex align-items-end flex-wrap-767">
                    <div class="social_media robotfonts">
                        <h6>Our Social Networks</h6>
                        <div>
                            @php
                                $socialLinks = \App\Support\Cms::entries('social_links', fn ($q) => $q->orderBy('order')); 
                            @endphp
                            
                            @if(count($socialLinks)>1)
                                @foreach($socialLinks as $socialLink)
                                    <a href="{{$socialLink->website}}" target="_blank" rel="noopener noreferrer"><img src="/assets/img/svg/{{$socialLink->class}}"></a>
                                @endforeach         
                            @endif
                        </div>
                    </div>
                    <div class="quick_links">
                        <ul>
                            <li><a target="_blank" href="/storage/documents/FGS-Politica-Proteccion-Datos-Personales.pdf" rel="noopener noreferrer">Personal Data Protection Policies</a></li>
                            <li class="b_septer">|</li>
                            <li><a target="_blank" href="/storage/documents/FGS-Aviso-de-Privacidad.pdf" rel="noopener noreferrer">Privacy Notice</a></li>
                            <li class="b_septer">|</li>
                            <li><a target="_blank" href="/storage/documents/FGS-Codigo-Gobierno.pdf" rel="noopener noreferrer">Government Code</a></li>
                            <li class="b_septer">|</li>
                            <li><a target="_self" href="/preguntas-frecuentes">FAQ</a></li>
                            <li class="b_septer">|</li>
                            <li><a target="_self" href="/contactenos">Contact us</a></li>
                        </ul>
                        <ul class="copyright mt-4">
                            <li>&copy; {{ now()->year }} - {{setting('site.title')}}</li>
                            <li class="b_septer">|</li>
                            <li>All rights reserved</li>
                            <li class="b_septer">|</li>
                            <li>Address: {{setting('site.footer_direction')}}</li>
                            <li class="b_septer">|</li>
                            <li>Phone: {{setting('site.footer_letephone')}}</li>
                        </ul>
                    </div>                  
                </div>
            </div>
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