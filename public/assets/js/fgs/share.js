window.FGS = window.FGS || {};

FGS.initShare = function () {
    var container = document.getElementById('sticky-container');
    if (!container) {
        return;
    }
    var urlActual = encodeURIComponent(window.location.href);
    var fb = container.querySelector('a[title="Compartir en Facebook"]');
    var li = container.querySelector('a[title="Compartir en LinkedIn"]');
    var wa = container.querySelector('a[title="Compartir en WhatsApp"]');
    var tw = container.querySelector('a[title="Compartir en Twitter"]');
    if (fb) {
        fb.href += urlActual;
    }
    if (li) {
        li.href += urlActual;
    }
    if (wa) {
        wa.href += urlActual;
    }
    if (tw) {
        tw.href = 'https://twitter.com/intent/tweet?url=' + urlActual;
        tw.addEventListener('click', function (e) {
            e.preventDefault();
            window.open(tw.href, '_blank');
        });
    }
};
