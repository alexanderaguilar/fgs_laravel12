@include('partials.breadcrumb')
<section id="blog" class="bg-light pt-3 pb-3">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col py-3">
                <h1>Noticias</h1>
            </div>
        </div>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row" id="post-container">
            @include('partials.posts')
        </div>
    </div>

    <!-- Indicador de Carga con Bootstrap Icons -->
    <div class="text-center my-4" id="loading" style="display: none;">
        <i class="bi bi-arrow-repeat" style="font-size: 2rem; animation: spin 1s linear infinite;"></i>
    </div>

    <input type="hidden" id="next-page-url" value="{{ $posts->nextPageUrl() }}">
</section>
