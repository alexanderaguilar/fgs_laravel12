@include('partials.breadcrumb', ['items' => [
    ['label' => 'Noticias', 'url' => '/noticias'],
    ['label' => \Illuminate\Support\Str::limit($post->title, 50)],
]])

<section class="blog_detail">

    <div class="container-fluid position-relative m-0 p-0 overflow-hidden">

            <!--<img class="fgs_img_blured" src="/storage/{{$post->image}}" alt="{{$post->title}}">-->
            <div class="gradient_white"></div>

            <div class="container-fluid fgs_article_head position-relative">
                <div class="row justify-content-center mt-2 mb-5 p-2">

                    <div class="col-12 col-lg-8">
                        <a class="btn btn-secondary my-3" data-action="history-back" href="#">Volver</a>
                        @php
                            $publishedAt = \Carbon\Carbon::parse($post->created_at ?? $post->publish_date ?? now());
                            $modifiedAt = \Carbon\Carbon::parse($post->updated_at ?? $publishedAt);
                        @endphp
                        <p class="text-deepblue text-capitalize mb-1">
                            <time datetime="{{ $publishedAt->toAtomString() }}">{{ $publishedAt->translatedFormat('l, d \d\e F \d\e Y') }}</time>
                        </p>
                        @if($modifiedAt->gt($publishedAt->copy()->addDay()))
                            <p class="text-secondary small mb-0">
                                Actualizado:
                                <time datetime="{{ $modifiedAt->toAtomString() }}">{{ $modifiedAt->translatedFormat('d \d\e F \d\e Y') }}</time>
                            </p>
                        @endif
                        <h1 class="text-deepblue my-4">{{$post->title}}</h1>
                        <h4 class="text-deepblue my-4">{{$post->sub_title}}</h4>
                        <p class="text-deepblue my-4">{{$post->excerpt}}</p>
                    </div>
            
                </div>
            </div>
                
    </div>

    <div class="container position-relative" data-aos="fade-up" style="z-index:10;margin-top: -50px;">


        <div class="row justify-content-center">
            
            <div class="col-12 col-lg-10 img_container">
                <img src="/storage/{{$post->image}}" alt="{{$post->title}}" title="{{$post->title}}" class="rounded">
            </div>

            <div class="col-12 col-lg-9 p-3 p-lg-5 post_content">
                {!! $post->body !!}
            </div>
           
        </div>
    </div>
</section>