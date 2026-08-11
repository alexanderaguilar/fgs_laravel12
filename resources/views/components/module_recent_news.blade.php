<section id="recent_news" class="py-5 bg-white">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col text-center text-md-center">
                <h3 class="mb-5 py-4 position-relative titleBox_Underline text-deepblue fw-bold fst-italic h2">Noticias</h3>
            </div>
        </div>

        @if(count($posts) > 0)
            @php 
                $featured = $posts->first(); 
                $others = $posts->slice(1);
            @endphp

            <!-- NOTICIA DESTACADA (Diagramación Novedosa) -->
            <div class="row mb-5">
                <div class="col-12">
                    <a href="{{ post_url($featured->slug) }}" class="featured_news_box d-block text-decoration-none shadow-lg rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-7 position-relative featured_img_col">
                                <img src="/storage/{{$featured->image}}" alt="{{$featured->title}}" class="w-100 h-100 object-fit-cover">
                                <div class="featured_badge position-absolute top-0 start-0 m-4 bg-primary text-white px-3 py-1 rounded-pill small fw-bold">
                                    Última noticia
                                </div>
                            </div>
                            <div class="col-lg-5 d-flex align-items-center bg-deepblue text-white p-4 p-md-5 position-relative">
                                <div class="featured_content">
                                    <p class="text-white-50 small mb-2">
                                        <i class="bi bi-calendar3 me-2"></i> {{ $featured->created_at->translatedFormat('d \d\e F \d\e Y') }}
                                    </p>
                                    <h4 class="h2 mb-4 fw-bold fst-italic">{{$featured->title}}</h4>
                                    <p class="mb-4 text-white opacity-75">{{ \Illuminate\Support\Str::words($featured->excerpt, 25, '...') }}</p>
                                    <span class="btn btn-outline-light rounded-pill px-4 btn-sm">Leer más <i class="bi bi-arrow-right ms-2"></i></span>
                                </div>
                                <!-- Decoración visual -->
                                <div class="featured_shape d-none d-lg-block"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- RESTO DE NOTICIAS (Contenedor para el Carrusel JS) -->
            <div class="row">
                <div id="news_list" class="col-12 news_carousel_wrapper">
                    @foreach($others as $post) 
                        <div class="p-2 mb-5">
                            <a href="{{ post_url($post->slug) }}" alt="{{$post->title}}" class="news_item_card d-block bg-light rounded-4 overflow-hidden text-decoration-none shadow-sm h-100">
                                <div class="img_container position-relative">
                                    <img src="/storage/{{$post->image}}" alt="{{$post->title}}" title="{{$post->title}}" class="w-100 object-fit-cover" height="220">
                                </div>
                                <div class="p-4 content_box">
                                    <p class="text-muted small mb-2"><i class="bi bi-calendar-event me-1"></i> {{ $post->created_at->translatedFormat('d \d\e F \d\e Y') }}</p>
                                    <h5 class=" text-deepblue h6 fw-bold mb-3 line-clamp-2">{{$post->title}}</h5>
                                    <p class="text-muted small">{{ \Illuminate\Support\Str::words($post->excerpt, 12, '...') }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center py-5">
                    <p class="text-muted fst-italic">No hay noticias registradas en este momento.</p>
                </div>
            </div>
        @endif
    </div>
</section>
