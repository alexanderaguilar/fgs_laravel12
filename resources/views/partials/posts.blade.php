@foreach($posts as $post)
<div class="col-md-4 grid mb-4">
    <a href="{{ post_url($post->slug) }}">
        <div class="row">
            <div class="col img_container">
                <img src="/storage/{{ $post->image }}" alt="{{ $post->title }}" title="{{ $post->title }}">
            </div>
        </div>
        <div class="row">
            <div class="col align-self-center p-3">
                <p><small>{{ $post->created_at->translatedFormat('d \d\e F \d\e Y') }}</small></p>
                <h5 class="my-2">{{ $post->title }}</h5>
                <p class="mb-5">{{ \Illuminate\Support\Str::words($post->excerpt, 15, '...') }}</p>
                <!--<a href="{{ post_url($post->slug) }}" class="btn btn-outline-dark my-3">Más información</a>-->
            </div>
        </div>
    </a>
</div>
@endforeach
