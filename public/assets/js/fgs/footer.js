window.FGS = window.FGS || {};

FGS.initFooter = function () {
    FGS.qsa('.footer-title').forEach(function (title) {
        title.addEventListener('click', function () {
            if (window.innerWidth >= 992) {
                return;
            }
            var self = this;
            setTimeout(function () {
                var target = document.querySelector(self.getAttribute('data-bs-target'));
                if (!target) {
                    return;
                }
                self.setAttribute('aria-expanded', target.classList.contains('show'));
            }, 100);
        });
    });
};
