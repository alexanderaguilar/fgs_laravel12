{{-- Home hero banners: imagen, MP4 local o YouTube + bloque infoExt --}}
<section id="all_banners" data-aos="fade-up">
    <div class="home-banners-slider">
        @foreach($banners as $banner)
            @php
                $mediaType = $banner->media_type ?? 'image';
                $ytId = $banner->youtube_id ?? '';
                $videoUrl = $banner->video_url ?? '';
                $isYoutube = $mediaType === 'youtube' && $ytId !== '';
                $isLocalVideo = $mediaType === 'video' && $videoUrl !== '';
                $isVideo = $isYoutube || $isLocalVideo;
                $desktop = ! empty($banner->thumbnail) ? '/storage/'.ltrim($banner->thumbnail, '/') : '';
                $mobile = ! empty($banner->thumbnail_mobile)
                    ? '/storage/'.ltrim($banner->thumbnail_mobile, '/')
                    : $desktop;
                $href = $banner->redirect_link ?? '';
                $target = $banner->target ?? '_self';
                $inverted = ($banner->inverted_text ?? false) == true;
                $ytUrl = $banner->youtube_url ?? '';
                $ytClick = $banner->youtube_click_url ?? '';
                if ($ytClick === '') {
                    $ytClick = $ytUrl !== '' ? $ytUrl : ($ytId !== '' ? 'https://www.youtube.com/watch?v='.$ytId : '');
                }
                $embedSrc = $isYoutube
                    ? 'https://www.youtube.com/embed/'.$ytId.'?autoplay=1&mute=1&controls=0&playsinline=1&rel=0&modestbranding=1&loop=1&playlist='.$ytId.'&enablejsapi=1'
                    : '';
                $buttonText = $banner->button_text ?? '';
                $showText = ($banner->text_display ?? 'on') != 'off';
            @endphp

            <div class="home-banner-slide fgs_lines{{ $isVideo ? ' is-video' : '' }}"
                 @if($isYoutube) data-banner-video="1" data-youtube-id="{{ $ytId }}"
                 @elseif($isLocalVideo) data-banner-video="1" data-local-video="1"
                 @endif>

                @if($isYoutube)
                    <div class="home-banner-media home-banner-media--video">
                        @if($desktop)
                            <img src="{{ $desktop }}" alt="" class="home-banner-img home-banner-img--poster d-none d-md-block" aria-hidden="true">
                        @endif
                        @if($mobile)
                            <img src="{{ $mobile }}" alt="" class="home-banner-img home-banner-img--poster d-block d-md-none" aria-hidden="true">
                        @endif
                        <div class="home-banner-video" data-yt-embed>
                            <iframe
                                title="{{ $banner->title }}"
                                src="{{ $embedSrc }}"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen
                                loading="eager"
                                referrerpolicy="strict-origin-when-cross-origin"
                            ></iframe>
                        </div>
                        @if($ytClick !== '')
                            <a href="{{ $ytClick }}"
                               class="home-banner-video-hit"
                               target="_blank"
                               rel="noopener noreferrer"
                               aria-label="Ver en YouTube: {{ $banner->title }}"></a>
                        @endif
                    </div>
                @elseif($isLocalVideo)
                    <div class="home-banner-media home-banner-media--video">
                        @if($desktop)
                            <img src="{{ $desktop }}" alt="" class="home-banner-img home-banner-img--poster d-none d-md-block" aria-hidden="true">
                        @endif
                        @if($mobile)
                            <img src="{{ $mobile }}" alt="" class="home-banner-img home-banner-img--poster d-block d-md-none" aria-hidden="true">
                        @endif
                        <div class="home-banner-video" data-local-embed>
                            <video
                                class="home-banner-video-el"
                                src="{{ $videoUrl }}"
                                muted
                                autoplay
                                loop
                                playsinline
                                preload="auto"
                                @if($desktop) poster="{{ $desktop }}" @endif
                                aria-label="{{ $banner->title }}"
                            ></video>
                        </div>
                        @if($href !== '')
                            <a href="{{ $href }}"
                               class="home-banner-video-hit"
                               target="{{ $target }}"
                               aria-label="{{ $banner->title }}"></a>
                        @endif
                    </div>
                @else
                    @if($href !== '')
                        <a href="{{ $href }}" target="{{ $target }}" class="home-banner-media" aria-label="{{ $banner->image_alt ?? $banner->title }}">
                    @else
                        <span class="home-banner-media">
                    @endif
                        @if($desktop)
                            <img src="{{ $desktop }}" alt="{{ $banner->image_alt ?? $banner->title }}" title="{{ $banner->image_alt ?? $banner->title }}" class="home-banner-img d-none d-md-block">
                        @endif
                        @if($mobile)
                            <img src="{{ $mobile }}" alt="{{ $banner->image_alt ?? $banner->title }}" title="{{ $banner->image_alt ?? $banner->title }}" class="home-banner-img d-block d-md-none">
                        @endif
                    @if($href !== '')
                        </a>
                    @else
                        </span>
                    @endif
                @endif

                @if($showText)
                    <div class="home-banner-info info infoExt text-start{{ $inverted ? ' is-inverted' : '' }}">
                        <h2 class="home-banner-title">{{ $banner->title }}</h2>
                        @if(($banner->description ?? '') !== '')
                            <div class="home-banner-desc">{!! $banner->description !!}</div>
                        @endif
                        @if(($href !== '' && $buttonText !== '') || ($isYoutube && $ytClick !== ''))
                            <div class="home-banner-actions">
                                @if($href !== '' && $buttonText !== '')
                                    <a href="{{ $href }}" class="home-banner-cta" target="{{ $target }}">
                                        {{ $buttonText }} <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                @elseif($isYoutube && $ytClick !== '')
                                    <a href="{{ $ytClick }}" class="home-banner-cta" target="_blank" rel="noopener noreferrer">
                                        Ver en YouTube <i class="bi bi-youtube ms-2"></i>
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
