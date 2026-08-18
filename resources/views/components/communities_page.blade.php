@include('partials.breadcrumb', ['items' => [['label' => 'Acompañamiento a comunidades']]])
<section class="page_title_section trabajo_en position-relative quienes_somos">
    <div class="d-flex">
        <div class="width50 bg_white d-none-767 d-none-991"> </div>
        <div class="width50 width100_767 width100_991 background_image">
        <div class="height_widht_over">
            <img class="object_fit_cover" src="/storage/pages/April2019/title_trabajo_en.png" width="880" height="300" />
        </div>
        </div>
    </div>
    <div class="position-absolute position-center">
        <div class="container-fluid">
        <div class="left_right_padding_80">
            <div class="title_box position-relative oswaldfonts">
            <div class="height_widht_over d-none-991">
                <img class="object_fit_cover" src="/storage/pages/April2019/inside_text_trabajo_en.png" width="858" height="178" />
            </div>
            <div class="position-absolute position-center z-index-9">
                <h1>Nuestro acompañamiento a comunidades</h1>
            </div>
            </div>
        </div>
        </div>
        <div class="title_under_line position-absolute position-center d-none-767 d-none-991"> </div>
    </div>
    <div class="container-fluid">
        <div class="left_right_padding_80">
        </div>
    </div>
</section>

<section class="programas_sociales_directos co actuamos bg_white">
    <div class="container-fluid">
        <div class="inner_text left_right_padding_80">
            <h2 class="oswaldfonts position-relative">Comunidades que acompañamos hoy:</h2>
        </div>
    </div>
    <div class="container-fluid">
        <div class="inner_text left_right_padding_80">
            <div class="max_width robotfonts">
                <div class="blank_space_30"> </div>
                <p class="wow bounceInUp robotfonts">Fundación Grupo Social acompaña a las comunidades para que ellas construyan condiciones para su propio desarrollo y logren un mejoramiento integral y sostenible en su calidad de vida.</p>
                <p class="wow bounceInUp robotfonts">Su trabajo lo realiza en un ámbito territorial porque es allí donde las comunidades construyen identidad, inciden en su entorno, proponen soluciones a los problemas cotidianos y desde la lectura de su realidad crean participativamente proyectos de desarrollo común.</p>
            </div>
        </div>
    </div>



    <div class="blank_space_50"> </div>
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

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-10">
                <a href="/viaje-por-el-modelo-de-calidad-de-vida" style="text-decoration:none; color:#FFF">
                    <div class="position-relative height300 white_text_color oswaldfonts">
                        <div class="height_widht_over">
                            <img class="object_fit_cover" src="/assets/img/calidad_vida/bg_terrain.jpg" width="100%" height="300" />
                        </div>
                        <h2 style="color: darkslategrey;
    bottom: 30px;
    left: 30px;" class="position-absolute"><small style="font-size:14px;">Clic aquí para conocer nuestro</small><br>Viaje por el Modelo de Calidad de Vida</h2>
                    </a>
            </div>
        </div>
    </div>

<section class="programas_sociales_directos co actuamos bg_white">
    <div class="container-fluid">
        <div class="inner_text left_right_padding_80">
            <h2 class="oswaldfonts position-relative">Comunidades en las que finalizamos acompañamiento:</h2>
        </div>
    </div>
    <div class="container-fluid">
        <div class="inner_text left_right_padding_80">
            <div class="max_width robotfonts">
                <div class="blank_space_30"> </div>
                <p class="wow bounceInUp robotfonts">Después de concluir nuestro acompañamiento a las comunidades de estos territorios, ellos hoy continúan generando alianzas y trabajando en equipo por quienes no han tenido suficientes oportunidades para progresar.</p>
            </div>    
        </div>
    </div>
    <div class="blank_space_50"> </div>
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

<section id="recent_news">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col text-center">
                <h3 class="mb-5 py-5 position-relative titleBox_Underline">Testimonios</h3>
            </div>
        </div>
        <div class="row mb-5">
            <div id="testimonial_featured_list" class="col mb-5">
            
                @foreach($recent_testimonials as $testimonial) 
                        <a href="{{ post_url($testimonial->slug) }}" alt="{{$testimonial->title}}" class="grid">
                            <div class="img_container">
                                <img src="/storage/{{$testimonial->image}}" alt="{{$testimonial->title}}" title="{{$testimonial->title}}">
                            </div>
                            <div class="p-3">
                                <p><small>{{ $testimonial->cat_name}}</small></p>
                                <p>{{ $testimonial->created_at }}</p>
                                <h5 class="my-3">{{$testimonial->title}}</h5>
                                <p>{{$testimonial->excerpt}}</p>
                            </div>
                        </a>
                @endforeach

            </a>
        </div>
    </div>
</section>

@include('components.module_company')