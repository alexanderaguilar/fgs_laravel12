<section id="all_banners">
    <div class="highlighted_banner position-relative" data-aos="fade-up">

        @foreach($banners as $banner) 
       
        <div class="fgs_lines position-relative content">
        <a href="{{ $banner->redirect_link }}">
            <img src="/storage/{{$banner->thumbnail}}" class="d-none d-sm-block object-fit-cover" alt="{{$banner->image_alt}}" title="{{$banner->image_alt}}">
            <img src="/storage/{{$banner->thumbnail_mobile}}" class="d-block d-sm-none object-fit-cover" alt="{{$banner->image_alt}}" title="{{$banner->image_alt}}"></a>
            
            @if($banner->text_display != 'off')
            <div class="position-absolute info text-start">
                <h2 class="@if($banner->inverted_text != true) text-white @else text-deepblue @endif text-start mb-4">{{$banner->title}}</h2>
                @if($banner->description != '')<div class="@if($banner->inverted_text != true) text-white @else text-deepblue @endif">{!! $banner->description !!}</div>@endif
                
                @if($banner->redirect_link != '')
                    <a href="{{ $banner->redirect_link }}" class="text-white" target="{{ $banner->target }}">{{ $banner->button_text }} <i class="bi bi-arrow-right ms-2"></i></a>
                @endif

                @if($banner->youtube_id != '')

                    <a href="#" role="button" class="text-white ms-3" data-video-id="{{ $banner->youtube_id }}">
                            Ver Video
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
                                <path d="M10.804 8 5 4.633v6.734zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
                            </svg>
                    </a>
                    
                @endif
            </div>
            @endif

        </div>
        @endforeach

    </div>
</section>