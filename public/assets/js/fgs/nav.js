window.FGS = window.FGS || {};

FGS.initNav = function () {
    var header = document.getElementById('site-header');

    var setHeaderHeight = function () {
        if (!header) {
            return;
        }

        // Measure expanded height for stable body clearance (avoids overlap while
        // the navbar padding transitions on scroll).
        var wasScrolled = header.classList.contains('is-scrolled');
        if (wasScrolled) {
            header.classList.remove('is-scrolled');
        }
        var expanded = header.offsetHeight;
        if (wasScrolled) {
            header.classList.add('is-scrolled');
        }

        document.documentElement.style.setProperty('--header-offset', expanded + 'px');
        document.documentElement.style.setProperty('--header-height', header.offsetHeight + 'px');
    };

    var scrollTicking = false;
    var onScroll = function () {
        if (scrollTicking) {
            return;
        }
        scrollTicking = true;
        requestAnimationFrame(function () {
            if (header) {
                header.classList.toggle('is-scrolled', window.scrollY > 24);
                // Live height only — do not shrink --header-offset (body padding).
                document.documentElement.style.setProperty('--header-height', header.offsetHeight + 'px');
            }
            scrollTicking = false;
        });
    };

    if (header) {
        setHeaderHeight();
        window.addEventListener('resize', setHeaderHeight);
        window.addEventListener('load', setHeaderHeight);
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    var searchOpenBtn = document.getElementById('site-search-open');
    var searchOverlay = document.getElementById('site-search');
    var searchInput = document.getElementById('site-search-input');
    var searchForm = searchOverlay ? searchOverlay.querySelector('.site-search__form') : null;
    var searchList = document.getElementById('site-search-list');
    var searchHint = document.getElementById('site-search-hint');
    var searchAll = document.getElementById('site-search-all');
    var searchCloseEls = searchOverlay ? searchOverlay.querySelectorAll('[data-site-search-close]') : [];
    var suggestTimer = null;
    var suggestAbort = null;
    var activeIndex = -1;
    var lastFocus = null;

    var escapeHtml = function (str) {
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
    };

    var setActiveSuggestion = function (index) {
        if (!searchList) {
            return;
        }
        var links = searchList.querySelectorAll('.site-search__link');
        activeIndex = index;
        links.forEach(function (link, i) {
            link.classList.toggle('is-active', i === activeIndex);
            if (i === activeIndex) {
                link.scrollIntoView({ block: 'nearest' });
            }
        });
    };

    var renderSuggestions = function (items, query) {
        if (!searchList || !searchHint || !searchAll) {
            return;
        }

        activeIndex = -1;

        if (!items.length) {
            searchList.hidden = true;
            searchList.innerHTML = '';
            searchAll.hidden = true;
            searchHint.hidden = false;
            searchHint.textContent = 'No hay sugerencias para “' + query + '”. Puedes buscar de todos modos.';
            searchHint.className = 'site-search__empty';
            return;
        }

        searchHint.hidden = true;
        searchList.hidden = false;
        searchList.innerHTML = items.map(function (item, i) {
            return (
                '<li class="site-search__item" role="option" id="site-search-opt-' + i + '">' +
                    '<a class="site-search__link" href="' + escapeHtml(item.url) + '" data-index="' + i + '">' +
                        '<span class="site-search__type">' + escapeHtml(item.type || 'Contenido') + '</span>' +
                        '<span class="site-search__title">' + escapeHtml(item.title || '') + '</span>' +
                        (item.excerpt ? '<span class="site-search__excerpt">' + escapeHtml(item.excerpt) + '</span>' : '') +
                    '</a>' +
                '</li>'
            );
        }).join('');

        searchAll.hidden = false;
        searchAll.href = (searchForm ? searchForm.action : '/search') + '?query=' + encodeURIComponent(query);
    };

    var fetchSuggestions = function (query) {
        if (!searchInput) {
            return;
        }
        var url = searchInput.getAttribute('data-suggest-url');
        var minChars = parseInt(searchInput.getAttribute('data-min-chars') || '3', 10);
        if (!url || query.length < minChars) {
            if (searchList) {
                searchList.hidden = true;
                searchList.innerHTML = '';
            }
            if (searchAll) {
                searchAll.hidden = true;
            }
            if (searchHint) {
                searchHint.hidden = false;
                searchHint.className = 'site-search__hint';
                searchHint.textContent = 'Escribe al menos ' + minChars + ' caracteres para ver sugerencias.';
            }
            return;
        }

        if (suggestAbort) {
            suggestAbort.abort();
        }
        suggestAbort = new AbortController();

        if (searchHint) {
            searchHint.hidden = false;
            searchHint.className = 'site-search__hint';
            searchHint.textContent = 'Buscando…';
        }

        fetch(url + '?q=' + encodeURIComponent(query), {
            headers: { Accept: 'application/json' },
            signal: suggestAbort.signal,
        })
            .then(function (res) {
                if (res.status === 429) {
                    throw new Error('rate_limited');
                }
                if (! res.ok) {
                    throw new Error('suggest_failed');
                }
                return res.json();
            })
            .then(function (data) {
                renderSuggestions(data.results || [], query);
            })
            .catch(function (err) {
                if (err && err.name === 'AbortError') {
                    return;
                }
                if (searchHint) {
                    searchHint.hidden = false;
                    searchHint.className = 'site-search__empty';
                    searchHint.textContent = err && err.message === 'rate_limited'
                        ? 'Demasiadas búsquedas. Espera un momento e inténtalo de nuevo.'
                        : 'No se pudieron cargar sugerencias. Usa Enter para buscar.';
                }
            });
    };

    var openSearch = function () {
        if (!searchOverlay || !searchInput) {
            return;
        }
        lastFocus = document.activeElement;
        searchOverlay.hidden = false;
        document.body.classList.add('site-search-open');
        searchOpenBtn && searchOpenBtn.setAttribute('aria-expanded', 'true');
        window.setTimeout(function () {
            searchInput.focus();
            searchInput.select();
        }, 30);
        fetchSuggestions(searchInput.value.trim());
    };

    var closeSearch = function () {
        if (!searchOverlay) {
            return;
        }
        searchOverlay.hidden = true;
        document.body.classList.remove('site-search-open');
        searchOpenBtn && searchOpenBtn.setAttribute('aria-expanded', 'false');
        if (suggestAbort) {
            suggestAbort.abort();
        }
        if (lastFocus && typeof lastFocus.focus === 'function') {
            lastFocus.focus();
        }
    };

    if (searchOpenBtn && searchOverlay && searchInput) {
        searchOpenBtn.setAttribute('aria-expanded', 'false');
        searchOpenBtn.addEventListener('click', function (e) {
            e.preventDefault();
            openSearch();
        });

        searchCloseEls.forEach(function (el) {
            el.addEventListener('click', closeSearch);
        });

        searchInput.addEventListener('input', function () {
            var q = searchInput.value.trim();
            window.clearTimeout(suggestTimer);
            suggestTimer = window.setTimeout(function () {
                fetchSuggestions(q);
            }, 280);
        });

        searchInput.addEventListener('keydown', function (event) {
            var links = searchList ? searchList.querySelectorAll('.site-search__link') : [];
            if (event.key === 'Escape') {
                event.preventDefault();
                closeSearch();
                return;
            }
            if (event.key === 'ArrowDown' && links.length) {
                event.preventDefault();
                setActiveSuggestion(Math.min(activeIndex + 1, links.length - 1));
                return;
            }
            if (event.key === 'ArrowUp' && links.length) {
                event.preventDefault();
                setActiveSuggestion(Math.max(activeIndex - 1, 0));
                return;
            }
            if (event.key === 'Enter' && activeIndex >= 0 && links[activeIndex]) {
                event.preventDefault();
                window.location.href = links[activeIndex].href;
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && searchOverlay && !searchOverlay.hidden) {
                closeSearch();
            }
        });

        if (searchForm) {
            searchForm.addEventListener('submit', function (event) {
                var q = searchInput.value.trim();
                var minChars = parseInt(searchInput.getAttribute('data-min-chars') || '3', 10);
                if (q.length < minChars) {
                    event.preventDefault();
                    if (searchHint) {
                        searchHint.hidden = false;
                        searchHint.className = 'site-search__hint';
                        searchHint.textContent = 'Escribe al menos ' + minChars + ' caracteres para buscar.';
                    }
                    searchInput.focus();
                }
            });
        }
    }

    var headerHeight = function () {
        return parseInt(getComputedStyle(document.documentElement).getPropertyValue('--header-height'), 10) || 110;
    };

    var sticky = document.getElementById('sticky-container');
    if (sticky) {
        var onStickyScroll = function () {
            var threshold = headerHeight();
            if (window.scrollY > threshold) {
                sticky.classList.add('fixed');
                sticky.style.top = (window.innerWidth < 768 ? threshold + 8 : threshold + 12) + 'px';
            } else {
                sticky.classList.remove('fixed');
                sticky.style.top = '70vh';
            }
        };
        window.addEventListener('scroll', onStickyScroll, { passive: true });
        onStickyScroll();
    }

    var tabNav = document.getElementById('myTab');
    if (tabNav) {
        var initialNavOffsetTop = tabNav.getAttribute('data-initial-top') || tabNav.offsetTop;
        if (!tabNav.getAttribute('data-initial-top')) {
            tabNav.setAttribute('data-initial-top', initialNavOffsetTop);
        }

        var updateStickyHeight = function () {
            document.documentElement.style.setProperty('--sticky-tab-height', tabNav.offsetHeight + 'px');
        };

        window.addEventListener('resize', updateStickyHeight);
        updateStickyHeight();

        document.addEventListener('scroll', function () {
            var navH = headerHeight();
            if (window.scrollY >= initialNavOffsetTop - navH) {
                tabNav.classList.add('fgs_content_sticky');
                tabNav.style.top = navH + 'px';
            } else {
                tabNav.classList.remove('fgs_content_sticky');
                tabNav.style.top = '';
            }
        }, { passive: true });
    }

    var internalDoorsNav = document.getElementsByClassName('internal-nav');
    if (internalDoorsNav.length > 0) {
        var internalNav = internalDoorsNav[0];
        window.addEventListener('scroll', function () {
            internalNav.classList.toggle('sticky', window.scrollY >= headerHeight());
        }, { passive: true });
    }
};
