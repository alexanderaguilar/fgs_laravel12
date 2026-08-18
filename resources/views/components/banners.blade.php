<section id="all_banners" data-aos="fade-up">
    <div class="home-banners-slider">
        @foreach($banners as $banner)
            @php
                $desktop = $banner->thumbnail ? '/storage/'.ltrim($banner->thumbnail, '/') : '';
                $mobile = $banner->thumbnail_mobile
                    ? '/storage/'.ltrim($banner->thumbnail_mobile, '/')
                    : $desktop;
                $href = $banner->redirect_link ?? '';
                $target = $banner->target ?: '_self';
                $inverted = $banner->inverted_text == true;
            @endphp

            <div class="home-banner-slide fgs_lines">
                @if($href !== '')
                    <a href="{{ $href }}" target="{{ $target }}" class="home-banner-media" aria-label="{{ $banner->image_alt ?: $banner->title }}">
                @else
                    <span class="home-banner-media">
                @endif
                    @if($desktop)
                        <img src="{{ $desktop }}" alt="{{ $banner->image_alt }}" title="{{ $banner->image_alt }}" class="home-banner-img d-none d-md-block">
                    @endif
                    @if($mobile)
                        <img src="{{ $mobile }}" alt="{{ $banner->image_alt }}" title="{{ $banner->image_alt }}" class="home-banner-img d-block d-md-none">
                    @endif
                @if($href !== '')
                    </a>
                @else
                    </span>
                @endif

                @if($banner->text_display != 'off')
                    <div class="home-banner-info{{ $inverted ? ' is-inverted' : '' }}">
                        <h2 class="home-banner-title">{{ $banner->title }}</h2>
                        @if($banner->description != '')
                            <div class="home-banner-desc">{!! $banner->description !!}</div>
                        @endif
                        @if(($href !== '' && $banner->button_text) || $banner->youtube_id != '')
                            <div class="home-banner-actions">
                                @if($href !== '' && $banner->button_text)
                                    <a href="{{ $href }}" class="home-banner-cta" target="{{ $target }}">
                                        {{ $banner->button_text }} <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                @endif
                                @if($banner->youtube_id != '')
                                    <a href="#" role="button" class="home-banner-cta" data-video-id="{{ $banner->youtube_id }}">
                                        Ver Video
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16" aria-hidden="true">
                                            <path d="M10.804 8 5 4.633v6.734zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696z"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</section>
