window.FGS = window.FGS || {};

FGS.initBooks = function () {
    if (typeof bootstrap === 'undefined') {
        return;
    }
    var popoverTriggerList = FGS.qsa('[data-bs-toggle="popover"]');
    if (!popoverTriggerList.length) {
        return;
    }
    popoverTriggerList.forEach(function (el) {
        new bootstrap.Popover(el, { container: 'body', trigger: 'click' });
    });
    document.addEventListener('click', function (e) {
        popoverTriggerList.forEach(function (el) {
            if (!el.contains(e.target)) {
                var instance = bootstrap.Popover.getInstance(el);
                if (instance) {
                    instance.hide();
                }
            }
        });
    });
};

FGS.ready(FGS.initBooks);
