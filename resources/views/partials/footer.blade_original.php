<footer>
	<div class="top_footer d-none-767">
		<div class="container-fluid">
			<div class="left_right_padding_40">
				<ul class="left_menu robotfonts">
					{{menu('front-footer-left-menu','menu.footer_left_menu')}}
				</ul>
				<ul class="left_menu right_menu robotfonts">
                	{{menu('front-footer-right-menu','menu.footer_right_menu')}}
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
						<h6>Nuestras Redes Sociales</h6>
						<div>
                        	@php
                                $socialLinks = App\Models\SocialLink::orderBy('name','ASC')->get(); 
                            @endphp
                            
                            @if(count($socialLinks)>1)
                            	@foreach($socialLinks as $socialLink)
                                	<a href="{{$socialLink->website}}" target="_blank"><img src="/assets/img/svg/{{$socialLink->class}}"></a>
                                @endforeach 	   	
                            @endif
						</div>
					</div>
					<div class="quick_links">
						<ul>
							{{menu('footer_left_menu','menu.footer_left_menu')}}
							{{menu('front-footer-bottom-menu','menu.footer_right_menu')}}
						</ul>
						<ul class="robotfonts copyright mt-4">
							<li>&copy; {{ now()->year }} - {{setting('site.title')}}</li>
							<li class="b_septer">|</li>
							<li>Todos los derechos reservados</li>
							<li class="b_septer">|</li>
							<li>Dirección: {{setting('site.footer_direction')}}</li>
							<li class="b_septer">|</li>
							<li>Teléfono: {{setting('site.footer_letephone')}}</li>
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
        <button type="button" class="btn-close modal-video-close" aria-label="Close" onclick="closeVideoModal()"></button>
        <!-- Embedded YouTube Video -->
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" id="videoIframe" allowfullscreen></iframe>
        </div>
    </div>
</div>