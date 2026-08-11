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
