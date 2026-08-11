window.FGS = window.FGS || {};

FGS.ready = function (fn) {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', fn);
    } else {
        fn();
    }
};

FGS.qs = function (sel, root) {
    return (root || document).querySelector(sel);
};

FGS.qsa = function (sel, root) {
    return Array.prototype.slice.call((root || document).querySelectorAll(sel));
};

FGS.initCore = function () {
    if (typeof AOS !== 'undefined') {
        AOS.init();
    }

    if (typeof bootstrap !== 'undefined') {
        FGS.qsa('[data-bs-toggle="tooltip"]').forEach(function (el) {
            new bootstrap.Tooltip(el);
        });
    }

    // Highlight "convocatoria" in #title when present
    var targetElement = document.getElementById('title');
    if (targetElement) {
        var text = targetElement.textContent || targetElement.innerText;
        targetElement.innerHTML = text.replace(/convocatoria/gi, '<span style="color: #E2CA00;">$&</span>');
    }

    // Toggle .box / .hidden pairs
    var prevClickedBox = null;
    FGS.qsa('.box').forEach(function (box) {
        var hiddenElement = box.querySelector('.hidden');
        if (!hiddenElement) {
            return;
        }
        box.addEventListener('click', function () {
            var isVisible = hiddenElement.classList.contains('visible');
            if (prevClickedBox !== null && prevClickedBox !== box) {
                var prevHidden = prevClickedBox.querySelector('.hidden');
                if (prevHidden) {
                    prevHidden.classList.remove('visible');
                }
            }
            if (!isVisible) {
                hiddenElement.classList.add('visible');
            } else {
                hiddenElement.classList.remove('visible');
            }
            prevClickedBox = box;
        });
    });
};
