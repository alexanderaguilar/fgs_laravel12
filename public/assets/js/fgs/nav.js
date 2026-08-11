window.FGS = window.FGS || {};

FGS.initNav = function () {
    var nav = document.querySelector('nav');
    var logoEl = document.getElementById('logo');
    var logo = logoEl ? logoEl.getElementsByClassName('img')[0] : null;

    if (nav && logo) {
        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 40) {
                nav.classList.add('bg-light', 'shadow');
                logo.style.height = '50px';
            } else {
                nav.classList.remove('bg-light', 'shadow');
                logo.style.height = 'auto';
            }
        });
    }

    var searchBtn = document.querySelector('.search-btn');
    var searchInput = document.querySelector('.search-input');
    if (searchBtn && searchInput) {
        searchBtn.addEventListener('click', function () {
            if (searchInput.classList.contains('expanded')) {
                searchInput.classList.remove('expanded');
                searchInput.blur();
            } else {
                searchInput.classList.add('expanded');
                searchInput.focus();
            }
        });
        document.addEventListener('click', function (event) {
            if (!searchInput.contains(event.target) && !searchBtn.contains(event.target)) {
                searchInput.classList.remove('expanded');
            }
        });
    }

    var sticky = document.getElementById('sticky-container');
    if (sticky) {
        var headerHeight = 110;
        var mobileHeaderHeight = 70;
        var mobileBreakpoint = 768;
        window.addEventListener('scroll', function () {
            var scrollPosition = window.scrollY || document.documentElement.scrollTop;
            var isMobile = window.innerWidth < mobileBreakpoint;
            var threshold = isMobile ? mobileHeaderHeight : headerHeight;
            if (scrollPosition > threshold) {
                sticky.classList.add('fixed');
                sticky.style.top = isMobile ? '80px' : '120px';
            } else {
                sticky.classList.remove('fixed');
                sticky.style.top = '70vh';
            }
        });
    }

    var tabNav = document.getElementById('myTab');
    if (tabNav) {
        var navbar = document.querySelector('.navbar');
        var updateNavbarHeight = function () {
            return navbar ? navbar.offsetHeight : 0;
        };
        var navbarHeight = updateNavbarHeight();
        var initialNavOffsetTop = tabNav.getAttribute('data-initial-top') || tabNav.offsetTop;
        if (!tabNav.getAttribute('data-initial-top')) {
            tabNav.setAttribute('data-initial-top', initialNavOffsetTop);
        }
        var updateStickyHeight = function () {
            navbarHeight = updateNavbarHeight();
            document.documentElement.style.setProperty('--sticky-tab-height', tabNav.offsetHeight + 'px');
        };
        window.addEventListener('resize', updateStickyHeight);
        updateStickyHeight();
        document.addEventListener('scroll', function () {
            if (window.scrollY >= initialNavOffsetTop - navbarHeight) {
                tabNav.classList.add('fgs_content_sticky');
                tabNav.style.top = navbarHeight + 'px';
            } else {
                tabNav.classList.remove('fgs_content_sticky');
                tabNav.style.top = '';
            }
        });
    }

    var internalDoorsNav = document.getElementsByClassName('internal-nav');
    if (internalDoorsNav.length > 0) {
        var internalNav = internalDoorsNav[0];
        window.addEventListener('scroll', function () {
            if (window.scrollY >= 100) {
                internalNav.classList.add('sticky');
            } else {
                internalNav.classList.remove('sticky');
            }
        });
    }
};
