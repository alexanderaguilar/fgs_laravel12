window.FGS = window.FGS || {};

FGS.initSliders = function () {
    if (typeof tns !== 'function') {
        return;
    }

    var newsResponsive = {
        1440: { edgePadding: 0, gutter: 0, items: 4 },
        960: { edgePadding: 0, gutter: 0, items: 3 },
        540: { edgePadding: 0, gutter: 0, items: 1 }
    };

    if (document.querySelector('#all_banners .home-banners-slider')) {
        var bannerSlider = tns({
            container: '#all_banners .home-banners-slider',
            items: 1,
            slideBy: 1,
            mouseDrag: true,
            controls: false,
            nav: true,
            navPosition: 'bottom',
            preventScrollOnTouch: 'auto',
            autoplay: true,
            autoplayTimeout: 30000,
            autoplayButtonOutput: false,
            autoHeight: false,
            fixedWidth: false,
            edgePadding: 0,
            gutter: 0
        });

        FGS.syncHomeBannerVideos(bannerSlider);
    }

    if (document.getElementById('big_video_slider')) {
        tns({
            container: '#big_video_slider',
            mouseDrag: true,
            controls: false,
            navPosition: 'bottom',
            items: 1,
            preventScrollOnTouch: 'auto',
            responsive: { 640: { edgePadding: 0, gutter: 0, items: 1 } }
        });
    }

    if (document.getElementById('testimonial_featured_list')) {
        tns({
            container: '#testimonial_featured_list',
            mouseDrag: true,
            controls: false,
            navPosition: 'bottom',
            preventScrollOnTouch: 'auto',
            responsive: newsResponsive
        });
    }

    if (document.getElementById('newsterritory_featured_list')) {
        tns({
            container: '#newsterritory_featured_list',
            mouseDrag: true,
            controls: false,
            navPosition: 'bottom',
            preventScrollOnTouch: 'auto',
            responsive: newsResponsive
        });
    }

    if (document.querySelector('.gallery_territories')) {
        var gallerySlider = tns({
            container: '.gallery_territories',
            items: 1,
            autoplay: false,
            controls: false,
            nav: false,
            mouseDrag: true,
            preventScrollOnTouch: 'auto',
            responsive: { 640: { items: 1 }, 900: { items: 1 } }
        });
        FGS.qsa('.thumbnail').forEach(function (thumb) {
            thumb.addEventListener('click', function () {
                var index = parseInt(this.dataset.index, 10);
                gallerySlider.goTo(index);
                FGS.qsa('.thumbnail').forEach(function (t) {
                    t.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    }

    if (document.querySelector('.text_territories')) {
        tns({
            container: '.text_territories',
            items: 1,
            autoplay: false,
            controls: false,
            nav: true,
            mouseDrag: true,
            navPosition: 'bottom',
            preventScrollOnTouch: 'auto',
            responsive: { 640: { items: 1 }, 900: { items: 1 } }
        });
    }

    if (document.querySelector('.text_criteria')) {
        tns({
            container: '.text_criteria',
            items: 1,
            autoplay: false,
            controls: false,
            nav: true,
            mouseDrag: true,
            navPosition: 'bottom',
            preventScrollOnTouch: 'auto',
            responsive: { 640: { items: 1 }, 900: { items: 1 } }
        });
    }

    if (document.querySelector('.territorios')) {
        tns({
            container: '.territorios',
            items: 1,
            autoplay: false,
            controls: false,
            nav: true,
            mouseDrag: true,
            navPosition: 'bottom',
            preventScrollOnTouch: 'auto',
            responsive: { 640: { items: 2 }, 900: { items: 4 } }
        });
    }

    if (document.querySelector('.territorios-old')) {
        tns({
            container: '.territorios-old',
            items: 1,
            autoplay: false,
            controls: false,
            nav: true,
            mouseDrag: true,
            navPosition: 'bottom',
            preventScrollOnTouch: 'auto',
            responsive: { 640: { items: 2 }, 900: { items: 5 } }
        });
    }
};

/** Pausa YouTube/MP4 fuera del slide activo; reanuda el visible (mute). */
FGS.syncHomeBannerVideos = function (slider) {
    if (!slider || typeof slider.getInfo !== 'function') {
        return;
    }

    function post(iframe, func) {
        if (!iframe || !iframe.contentWindow) {
            return;
        }
        iframe.contentWindow.postMessage(
            JSON.stringify({ event: 'command', func: func, args: [] }),
            'https://www.youtube.com'
        );
    }

    function sync() {
        var info = slider.getInfo();
        var slides = info.slideItems || [];
        var index = info.index % (info.slideCount || 1);

        Array.prototype.forEach.call(slides, function (slide, i) {
            var active = i === index;
            var iframe = slide.querySelector('.home-banner-video iframe');
            var video = slide.querySelector('.home-banner-video-el');

            if (iframe) {
                post(iframe, active ? 'playVideo' : 'pauseVideo');
            }
            if (video) {
                if (active) {
                    var playPromise = video.play();
                    if (playPromise && typeof playPromise.catch === 'function') {
                        playPromise.catch(function () {});
                    }
                } else {
                    video.pause();
                }
            }
        });
    }

    sync();
    slider.events.on('indexChanged', sync);
};
