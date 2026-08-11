<section id="bread-crumb" class="d-none d-md-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col py-2 px-4">
                <p><a href="/">Inicio</a> - <a href="/testimonios">Testimonios</a></p>
            </div>
        </div>
    </div>
</section>

<!-- Header Desktop-->
<div class="container-fluid position-relative m-0 p-0 overflow-hidden d-none d-md-block">
    <img class="fgs_img_blured" src="/storage/home-maplogos/March2021/foto_hone_como_somos.jpg" alt="">
    <div class="gradient_alpha"></div>

    <div class="container-fluid fgs_article_head position-relative">
        <div class="row justify-content-start mt-2 mb-5 p-2 p-md-4">

            <div class="col-12 col-lg-8">
                <a class="btn btn-secondary mt-5 mb-3" data-action="history-back" href="#">Volver</a>
                <p class="text-white">Fundación Grupo Social / Impacto</p>
                <h1 class="my-2">Testimonios</h1>
            </div>
    
        </div>
    </div>  
</div>
<!-- Header Mobile -->
<h1 class="m-4 mb-5 py-4 d-block d-md-none text-deepblue position-relative colored_lines">Testimonios</h1>

<section id="recent_news">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col text-center">
                <h3 class="mb-5 py-5 position-relative titleBox_Underline">Lo más reciente</h3>
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
                                <p class=""><small>{{ $testimonial->created_at->translatedFormat('d \d\e F \d\e Y') }}</small></p>
                                <h5 class="my-2">{{ $testimonial->title }}</h5>
                                <p class="mb-5">{{ \Illuminate\Support\Str::words($testimonial->excerpt, 15, '...') }}</p>
                            </div>
                        </a>
                @endforeach

            </a>
        </div>
    </div>
</section>


<div class="container-fluid m-0 p-0">
    <ul class="nav fgs_content_nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link w-100 py-4 active" id="tab1" data-bs-toggle="tab" data-bs-target="#content1" type="button" role="tab" aria-controls="content1" aria-selected="true">Desde nuestras empresas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link w-100 py-4" id="tab2" data-bs-toggle="tab" data-bs-target="#content2" type="button" role="tab" aria-controls="content2" aria-selected="false">Desde nuestros Territorios Progreso</button>
        </li>
    </ul>

    <div class="tab-content fgs_content_tab-content" id="myTabContent">
        <div class="tab-pane fade show active p-3 p-md-5 m-1 m-md-5" id="content1" role="tabpanel" aria-labelledby="tab1">
            <h2 class="colored_lines position-relative pb-3 mb-5 we_700">Desde nuestras empresas</h2>
            <div class="m-5">
                <p class="mb-4">Esta es la voz de personas, microempresarios, emprendedores; colombianos que han tocado las puertas de nuestras empresas y se les han abierto las oportunidades para que puedan progresar, salir adelante y cumplir sus sueños. 
<br><br>
Esta es la voz de esos que nunca se rinden, que siempre dan todo de sí y con quienes tenemos un compromiso verdadero que nos motiva a dar lo mejor todos los días.</p>
            </div>
        </div>
        <div class="tab-pane fade fgs_content_bg-light p-3 p-md-5 m-1 m-md-5" id="content2" role="tabpanel" aria-labelledby="tab2">
            <h2 class="colored_lines position-relative pb-3 mb-5 we_700">Desde nuestros Territorios Progreso</h2>
            <div class="m-5">
                <p class="mb-4">Esta es la voz de los habitantes de las comunidades que acompañamos desde los Territorios Progreso, personas trabajadoras, soñadoras, luchadoras, que día a día trabajan de manera más organizada y colectiva para hacer realidad todas las iniciativas y proyectos. Personas que únicamente buscan el bien común y el desarrollo de estos maravillosos lugares alrededor del país.</p>
            </div>
        </div>
    </div>
</div>