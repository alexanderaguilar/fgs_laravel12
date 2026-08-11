<section id="recent_news">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col text-center">
                <h3 class="mb-5 py-5 position-relative titleBox_Underline">Testimonios</h3>
            </div>
        </div>
        <div class="row">
            <div id="news_list" class="col">
            
                @foreach($posts as $post) 
                        <a href="{{ post_url($post->slug) }}" alt="{{$post->title}}" class="grid">
                            <div class="img_container">
                                <img src="/storage/{{$post->image}}" alt="{{$post->title}}" title="{{$post->title}}">
                            </div>
                            <div class="p-3">
                                <p class="badge bg-light text-dark">{{$post->created_at}}</p>
                                <h5 class="my-3">{{$post->title}}</h5>
                                <p>{{$post->excerpt}}</p>
                            </div>
                        </a>
                @endforeach

            </a>
        </div>
    </div>
</section>