window.FGS = window.FGS || {};

FGS.initHome = function () {
    if (typeof tns !== 'function') {
        return;
    }
    if (document.getElementById('news_list')) {
        tns({
            container: '#news_list',
            mouseDrag: true,
            controls: false,
            navPosition: 'bottom',
            preventScrollOnTouch: 'auto',
            responsive: {
                1440: { edgePadding: 0, gutter: 0, items: 4 },
                960: { edgePadding: 0, gutter: 0, items: 3 },
                540: { edgePadding: 0, gutter: 0, items: 1 }
            }
        });
    }

    FGS.initOwnerLogosSlider();
};

FGS.initOwnerLogosSlider = function () {
    var el = document.getElementById('home_owner_logos');
    if (!el || typeof tns !== 'function') {
        return;
    }

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    var slider = null;
    var bar = el.closest('.home-owner__bar');

    function logoCount() {
        return el.querySelectorAll('.home-owner__item').length || el.children.length;
    }

    /** Logos visibles cómodos por ancho (min-width, alineado a tns.responsive). */
    function visibleForWidth(width) {
        if (width >= 1400) {
            return 9;
        }
        if (width >= 1200) {
            return 7;
        }
        if (width >= 1080) {
            return 6;
        }
        if (width >= 1024) {
            return 6;
        }
        if (width >= 900) {
            return 5;
        }
        if (width >= 768) {
            return 4;
        }
        if (width >= 576) {
            return 3;
        }
        return 2;
    }

    function shouldAnimate() {
        return logoCount() > visibleForWidth(window.innerWidth);
    }

    function setCarouselClass(on) {
        if (!bar) {
            return;
        }
        bar.classList.toggle('is-carousel', !!on);
    }

    function enable() {
        if (slider || !shouldAnimate()) {
            return;
        }

        var initialItems = visibleForWidth(window.innerWidth);

        slider = tns({
            container: el,
            items: initialItems,
            slideBy: 1,
            gutter: 8,
            edgePadding: 0,
            loop: true,
            speed: 750,
            autoplay: !reduceMotion.matches,
            autoplayTimeout: 3400,
            autoplayHoverPause: true,
            autoplayButtonOutput: false,
            controls: false,
            nav: false,
            mouseDrag: true,
            swipeAngle: 40,
            preventScrollOnTouch: 'auto',
            ariaLive: false,
            responsive: {
                576: { items: 3, gutter: 10 },
                768: { items: 4, gutter: 12 },
                900: { items: 5, gutter: 14 },
                1024: { items: 6, gutter: 14 },
                1080: { items: 6, gutter: 16 },
                1200: { items: 7, gutter: 16 },
                1400: { items: 8, gutter: 18 }
            }
        });

        setCarouselClass(true);
    }

    function disable() {
        if (!slider) {
            setCarouselClass(false);
            return;
        }
        try {
            slider.destroy(true);
        } catch (e) {
            /* ignore */
        }
        slider = null;
        setCarouselClass(false);
    }

    function sync() {
        if (shouldAnimate()) {
            if (!slider) {
                enable();
            }
        } else {
            disable();
        }
    }

    sync();

    var resizeTimer;
    window.addEventListener('resize', function () {
        window.clearTimeout(resizeTimer);
        resizeTimer = window.setTimeout(sync, 180);
    }, { passive: true });
};

FGS.ready(FGS.initHome);
