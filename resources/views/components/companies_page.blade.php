@include('partials.breadcrumb')
<section class="page_title_section trabajo_en position-relative quienes_somos">
<div class="d-flex">
<div class="width50 bg_white d-none-767 d-none-991">&nbsp;</div>
<div class="width50 width100_767 width100_991 background_image">
<div class="height_widht_over"><img class="object_fit_cover" src="/storage/pages/May2019/fundacion-grupo-social-encabezado-empresas-2.jpg" width="880" height="300"></div>
</div>
</div>
<div class="position-absolute position-center">
<div class="container-fluid">
<div class="left_right_padding_80">
<div class="title_box position-relative oswaldfonts">
<div class="height_widht_over d-none-991"><img class="object_fit_cover" src="/storage/pages/May2019/fundacion-grupo-social-encabezado-empresas-1.jpg" width="859" height="177"></div>
<div class="position-absolute position-center z-index-9">
<h1>Nuestras Empresas</h1>
</div>
</div>
</div>
</div>
<div class="title_under_line position-absolute position-center d-none-767 d-none-991">&nbsp;</div>
</div>
<div class="container-fluid">
<div class="left_right_padding_80"></div>
</div>
</section>
<section class="actuamos bg_white mt-5">
<div class="container-fluid">
<div class="inner_text left_right_padding_80">
<div class="wow bounceInUp max_width robotfonts">
<p class="center robotfonts">Desde hace m&aacute;s de un siglo, Fundaci&oacute;n Grupo Social ha creado empresas con el &uacute;nico prop&oacute;sito de promover la inclusi&oacute;n y el bienestar de los colombianos, especialmente los menos favorecidos. Esto hace parte de su esencia.</p>
<p>Hoy Fundaci&oacute;n Grupo Social tiene un grupo de 10 empresas que son distintas, porque conocen las reales necesidades de la gente y act&uacute;an para encontrar soluciones concretas a esas problem&aacute;ticas.</p>
<p>Este grupo de empresas tienen como objetivo la generaci&oacute;n de experiencias de una forma de organizaci&oacute;n diferente, orientada por la &eacute;tica, los valores trascendentes, el bien com&uacute;n, la solidaridad y la preocupaci&oacute;n por los m&aacute;s d&eacute;biles, en compatibilidad con la generaci&oacute;n de riqueza para la sociedad en su conjunto, la solvencia, la viabilidad econ&oacute;mica y el retorno justo para sus accionistas.</p>
<div class="blank_space_60">&nbsp;</div>
</div>
</div>
</div>
</section>
<section class="programas_sociales_directos co actuamos bg_white">
<div class="container-fluid">
<div class="inner_text left_right_padding_80">
<h2 class="oswaldfonts position-relative">Empresas de Fundaci&oacute;n Grupo Social:</h2>
</div>
</div>
<div class="blank_space_50">&nbsp;</div>
<div class="d-flex flex-wrap propietaria_section align-items-center justify-content-center">
    @foreach($social_foundation as $sf)
        <div class="propietaria_box">
            <div class="image_logo">
                @if($sf->website != '')
                    <a href="{{ $sf->website }}" alt="{{ $sf->website }}" target="_blank">
                @endif
                <img class="" src="{{ asset('storage/' . $sf->logo) }}" width="300" alt="{{ $sf->website }}" />
                @if($sf->website != '')
                    </a>
                @endif
            </div>
        </div>
    @endforeach

</div>
</section>
<section class="programas_sociales_directos co actuamos bg_white participa_delcapitalde">
<div class="container-fluid">
<div class="inner_text left_right_padding_80">
<h2 class="oswaldfonts position-relative">Empresas en las que comparte la propiedad con un aliado:</h2>
</div>
</div>
<div class="blank_space_50">&nbsp;</div>
<div class="d-flex flex-wrap propietaria_section align-items-center justify-content-center">
<div class="propietaria_box position-relative">
<div class="image_logo"><img class="" src="/storage/participate-capitals/May2019/logo_vehigrupo.png"></div>
</div>
<div class="propietaria_box position-relative">
<div class="image_logo"><img class="" src="/storage/participate-capitals/May2019/logo_lilium.png"></div>
</div>
<div class="propietaria_box position-relative">
<div class="image_logo"><img src="/storage/pages/February2022/Logo_solucionesdecreditoNewSite1.png" alt=""></div>
</div>
</div>
</section>
<section class="programas_sociales_directos co actuamos bg_white participa_delcapitalde">
<div class="container-fluid">
<div class="inner_text left_right_padding_80">
<h2 class="oswaldfonts position-relative">Participa del capital de:</h2>
</div>
</div>
<div class="blank_space_50">&nbsp;</div>
<div class="d-flex flex-wrap propietaria_section align-items-center justify-content-center">
    @php
        $participate_capital = \App\Support\Cms::entries('participate_capitals', fn ($q) => $q->orderBy('display_rank'));
    @endphp
    @foreach($participate_capital as $pc)
        <div class="propietaria_box position-relative">
            <div class="image_logo">
                <img src="{{ asset('storage/' . $pc->logo) }}" class="" alt="{{ $pc->title }}">
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

@include('components.module_community')