@include('partials.breadcrumb')
<section class="page_title_section trabajo_en position-relative quienes_somos">
	<div class="d-flex">
		<div class="width50 bg_white d-none-767 d-none-991"></div>
		<div class="width50 width100_767 width100_991 background_image">
			<div class="height_widht_over"><img class="object_fit_cover" src="/storage/{{$citydata->map_image}}" alt=""></div>
		</div>
	</div>
	<div class="position-absolute position-center">
		<div class="container-fluid">
			<div class="left_right_padding_80">
				<div class="title_box position-relative oswaldfonts">
					<div class="height_widht_over d-none-991"><img class="object_fit_cover" src="/storage/{{$citydata->title_bg_image}}" alt=""></div>
					<div class="position-absolute position-center z-index-9">
						<p>Nuestro acompañamiento a comunidades</p>
						<h1>{{$citydata->name}}</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="title_under_line position-absolute position-center d-none-767 d-none-991"></div>
	</div>
	<div class="container-fluid">
		<div class="left_right_padding_80 width50">
			
		</div>
	</div>
</section>

<section class="bg-white community_unit_section">	
	<div class="d-flex flex-wrap-991">
		<div class="width50 width100_991">
			<div class="info_community">
				<div class="blockicon position-relative"></div>				
				<div class="text_pra">					
					<p>{{$citydata->description}}</p>					
				</div>
				<div>{!!$citydata->city_other_data!!}</div>
			</div>
		</div>
		<div class="width50 width100_991">
			<div class="imgaesHeightes">
				<img src="/storage/{{$citydata->image}}" alt="" class="object_fit_cover">
			</div>
			<div class="rt_text_info robotfonts">
				<ul>
					<li>
						<p>Territorio</p>
						<h4>{{$citydata->territory}} </h4>
					</li>
					<li>
						<p>Qué buscamos</p>
						<h4>{{$citydata->looking_for}}</h4>
					</li>
					<li>
						<p>Habitantes</p>
						<span>{!!$citydata->habitantes!!} </span>
					</li>
				</ul>
			</div>
		</div>
	</div>	
</section>

@if (count($recent_testimonials) > 0)
    <section class="logros_alcanzados co actuamos bg_white padding_bottom_zero new_carta">
        <div class="container-fluid">
            <div class="inner_text left_right_padding_80">
                <h2 class="oswaldfonts position-relative">Si quiere conocer más sobre el desarrollo de las líneas estratégicas definidas, lo invitamos a consultar las siguientes noticias de nuestro acompañamiento en <strong>{{$citydata->name}}:</strong></h2>
            </div>
        </div> 
        <div class="blank_space_50"></div>
    </section>

    <section id="recent_news">
        <div class="container" data-aos="fade-up">
            <div class="row mb-5">
                <div id="testimonial_featured_list" class="col mb-5">
                
                    @foreach($recent_testimonials as $testimonial) 
                            <a href="{{ post_url($testimonial->slug) }}" alt="{{$testimonial->title}}" class="grid">
                                <div class="img_container">
                                    <img src="/storage/{{$testimonial->image}}" alt="{{$testimonial->title}}" title="{{$testimonial->title}}">
                                </div>
                                <div class="p-3">
                                    <p>{{$testimonial->created_at}}</p>
                                    <h5 class="my-3">{{$testimonial->title}}</h5>
                                    <p>{{$testimonial->excerpt}}</p>
                                </div>
                            </a>
                    @endforeach

                </a>
            </div>
        </div>
    </section>
@endif

<section class="programas_sociales_directos co actuamos bg_white">
    <div class="container-fluid">
        <div class="inner_text left_right_padding_80">
            <h2 class="oswaldfonts position-relative">Comunidades que acompañamos hoy:</h2>
        </div>
    </div>
    <div class="container-fluid">
        <div class="inner_text left_right_padding_80">
            <div class="max_width robotfonts">
                <div class="blank_space_30">&nbsp;</div>
                <p class="wow bounceInUp robotfonts">Fundaci&oacute;n Grupo Social acompa&ntilde;a a las comunidades para que ellas construyan condiciones para su propio desarrollo y logren un mejoramiento integral y sostenible en su calidad de vida.</p>
                <p class="wow bounceInUp robotfonts">Su trabajo lo realiza en un &aacute;mbito territorial porque es all&iacute; donde las comunidades construyen identidad, inciden en su entorno, proponen soluciones a los problemas cotidianos y desde la lectura de su realidad crean participativamente proyectos de desarrollo com&uacute;n.</p>
            </div>
        </div>
    </div>
    <div class="blank_space_50">&nbsp;</div>
    <div class="d-flex flex-wrap"> 
        @foreach ($cities as $ct)
            <div class="program_box zoomeffice">
                <a href="/nuestro-acompanamiento-a-comunidades/{{$ct->slug}}" style="text-decoration:none; color:#FFF">
                    <div class="narino position-relative height300 white_text_color oswaldfonts">
                        <div class="height_widht_over">
                            <img class="object_fit_cover" src="/storage/{{$ct->listing_image}}" width="560" height="300" />
                        </div>
                        <h4 style="font-size:24px;" class="position-absolute">{{$ct->name}}<br>
                        <small style="font-size:14px;">{{$ct->state}}</small></h4>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="programas_sociales_directos co actuamos bg_white">
    <div class="container-fluid">
        <div class="inner_text left_right_padding_80">
            <h2 class="oswaldfonts position-relative">Comunidades en las que finalizamos acompañamiento:</h2>
        </div>
    </div>
    <div class="container-fluid">
        <div class="inner_text left_right_padding_80">
            <div class="max_width robotfonts">
                <div class="blank_space_30">&nbsp;</div>
                <p class="wow bounceInUp robotfonts">Después de concluir nuestro acompañamiento a las comunidades de estos territorios, ellos hoy continúan generando alianzas y trabajando en equipo por quienes no han tenido suficientes oportunidades para progresar.</p>
            </div>    
        </div>
    </div>
    <div class="blank_space_50">&nbsp;</div>
    <div class="d-flex flex-wrap"> 
        @foreach ($cities_old as $ct)
            <div class="program_box zoomeffice">
                <a href="/nuestro-acompanamiento-a-comunidades/{{$ct->slug}}" style="text-decoration:none; color:#FFF">
                    <div class="narino position-relative height300 white_text_color oswaldfonts">
                        <div class="height_widht_over">
                            <img class="object_fit_cover" src="/storage/{{$ct->listing_image}}" width="560" height="300" />
                        </div>
                        <h4 style="font-size:24px;" class="position-absolute">{{$ct->name}}<br>
                        <small style="font-size:14px;">{{$ct->state}}</small></h4>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>