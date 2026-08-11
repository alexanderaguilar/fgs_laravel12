window.FGS = window.FGS || {};

FGS.init = function () {
    if (typeof FGS.initCore === 'function') {
        FGS.initCore();
    }
    if (typeof FGS.initNav === 'function') {
        FGS.initNav();
    }
    if (typeof FGS.initSliders === 'function') {
        FGS.initSliders();
    }
    if (typeof FGS.initVideoModal === 'function') {
        FGS.initVideoModal();
    }
    if (typeof FGS.initCookies === 'function') {
        FGS.initCookies();
    }
    if (typeof FGS.initHistoryBack === 'function') {
        FGS.initHistoryBack();
    }
    if (typeof FGS.initFooter === 'function') {
        FGS.initFooter();
    }
    if (typeof FGS.initTabsScroll === 'function') {
        FGS.initTabsScroll();
    }
    if (typeof FGS.initShare === 'function') {
        FGS.initShare();
    }
};

FGS.ready(FGS.init);
