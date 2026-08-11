window.FGS = window.FGS || {};

FGS.initHome = function () {
    if (typeof tns !== 'function') {
        return;
    }
    if (document.querySelector('.highlighted_banner')) {
        tns({
            container: '.highlighted_banner',
            items: 1,
            mouseDrag: true,
            controls: false,
            navPosition: 'bottom',
            preventScrollOnTouch: 'auto',
            autoplay: true,
            autoplayTimeout: 4000,
            responsive: { 640: { edgePadding: 0, gutter: 0, items: 1 } }
        });
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
};

FGS.ready(FGS.initHome);
