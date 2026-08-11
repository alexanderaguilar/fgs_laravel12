window.FGS = window.FGS || {};

/**
 * Horizontal scroll helpers for tab/menu strips (mega about, howweare, territory tabs).
 */
FGS.initTabsScroll = function () {
    // How we are: #tabSub + #tabArrow
    var tabList = document.getElementById('tabSub');
    var tabArrow = document.getElementById('tabArrow');
    if (tabList) {
        tabList.addEventListener('scroll', function () {
            if (!tabArrow) {
                return;
            }
            if (tabList.scrollLeft > 30) {
                tabArrow.style.opacity = '0';
                setTimeout(function () {
                    if (tabList.scrollLeft > 30) {
                        tabArrow.style.display = 'none';
                    }
                }, 300);
            } else {
                tabArrow.style.display = 'block';
                setTimeout(function () {
                    tabArrow.style.opacity = '1';
                }, 10);
            }
        });
        var activeTab = tabList.querySelector('.nav-link.active');
        if (activeTab) {
            setTimeout(function () {
                var containerWidth = tabList.offsetWidth;
                var tabOffsetLeft = activeTab.offsetLeft;
                var tabWidth = activeTab.offsetWidth;
                tabList.scrollTo({
                    left: tabOffsetLeft - containerWidth / 2 + tabWidth / 2,
                    behavior: 'smooth'
                });
            }, 200);
        }
    }

    // Mega about: #menuSlider + #scrollArrow
    var menuSlider = document.getElementById('menuSlider');
    var scrollArrow = document.getElementById('scrollArrow');
    var currentUrl = window.location.href;
    var activeElement = null;
    FGS.qsa('.menu-item a').forEach(function (link) {
        var href = link.getAttribute('href');
        if (currentUrl === link.href || (href && currentUrl.indexOf(href) !== -1)) {
            link.classList.add('active');
            activeElement = link;
        }
    });
    if (activeElement && window.innerWidth < 992) {
        activeElement.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
        setTimeout(function () {
            if (menuSlider && menuSlider.scrollLeft > 15 && scrollArrow) {
                scrollArrow.style.display = 'none';
            }
        }, 500);
    }
    if (menuSlider && scrollArrow) {
        menuSlider.addEventListener('scroll', function () {
            if (menuSlider.scrollLeft > 15) {
                scrollArrow.style.transition = 'opacity 0.3s';
                scrollArrow.style.opacity = '0';
                setTimeout(function () {
                    scrollArrow.style.display = 'none';
                }, 300);
            }
        });
    }

    // Territory tabs scroll indicator
    var territoryTabs = document.getElementById('territoryTabs');
    if (territoryTabs) {
        var indicator = document.querySelector('.scroll-indicator-tabs') || document.getElementById('territoryTabsScrollIndicator');
        var update = function () {
            if (!indicator) {
                return;
            }
            var maxScroll = territoryTabs.scrollWidth - territoryTabs.clientWidth;
            if (maxScroll <= 2 || territoryTabs.scrollLeft >= maxScroll - 2) {
                indicator.style.opacity = '0';
            } else {
                indicator.style.opacity = '1';
            }
        };
        territoryTabs.addEventListener('scroll', update);
        window.addEventListener('resize', update);
        update();
    }
};
