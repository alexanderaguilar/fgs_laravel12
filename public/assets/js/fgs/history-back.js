window.FGS = window.FGS || {};

FGS.initHistoryBack = function () {
    document.addEventListener('click', function (event) {
        var el = event.target.closest('[data-action="history-back"]');
        if (!el) {
            return;
        }
        event.preventDefault();
        history.back();
    });
};
