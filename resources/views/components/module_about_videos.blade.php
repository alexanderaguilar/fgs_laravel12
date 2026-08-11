@php
    $aboutUsVideo = \App\Support\Cms::entries('about_us_videos', fn ($q) => $q->orderBy('order', 'desc'));
@endphp
<section class="section_two_quie position-relative page_main_video_thumb small_logo_slider two">

<div id="big_video_slider">

    @if(count($aboutUsVideo)>1)
        @foreach($aboutUsVideo as $av)
            <div class="item position-relative">
                <div class="overlay_layer_point2 position-absolute"></div>
                <img class="object_fit_cover" src="/storage/{{$av->video_thumbnail ?? $av->thumbnail}}">
                <div class="position-absolute position-center">
                    <div class="text-center">

                        <a href="#" role="button" class="btn_play" data-video-id="{{ $av->youtube_id }}">
                            <div class="tm-video-button js-video-button">
                                <span class="tm-video-animaiton"><span style=""><img src="/storage/pages/April2019/play.png"></span></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
</section>
