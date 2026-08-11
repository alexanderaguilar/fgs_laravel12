window.FGS = window.FGS || {};

FGS.initTerritoriesList = function () {
    var offcanvasElement = document.getElementById('offcanvasPillsMenu');
    if (!offcanvasElement || typeof bootstrap === 'undefined') {
        return;
    }
    offcanvasElement.querySelectorAll('.nav-link').forEach(function (link) {
        link.addEventListener('click', function () {
            if (window.innerWidth < 992) {
                var bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                if (bsOffcanvas) {
                    bsOffcanvas.hide();
                }
            }
        });
    });
};

FGS.ready(FGS.initTerritoriesList);
