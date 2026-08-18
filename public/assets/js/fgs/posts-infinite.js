window.FGS = window.FGS || {};

FGS.initPostsInfinite = function () {
    var postContainer = document.getElementById('post-container');
    var nextPageInput = document.getElementById('next-page-url');
    if (!postContainer || !nextPageInput) {
        return;
    }

    var loading = false;
    var loadingIndicator = document.getElementById('loading');
    var nextPageUrl = (nextPageInput.value || '').trim();

    function pageHeight() {
        var doc = document.documentElement;
        var body = document.body;
        return Math.max(
            body ? body.scrollHeight : 0,
            body ? body.offsetHeight : 0,
            doc ? doc.scrollHeight : 0,
            doc ? doc.offsetHeight : 0,
            doc ? doc.clientHeight : 0
        );
    }

    function nearBottom() {
        var scrollPos = window.scrollY || window.pageYOffset || docScrollTop();
        return window.innerHeight + scrollPos >= pageHeight() - 200;
    }

    function docScrollTop() {
        return document.documentElement ? document.documentElement.scrollTop : 0;
    }

    function setLoading(isLoading) {
        loading = isLoading;
        if (loadingIndicator) {
            loadingIndicator.style.display = isLoading ? 'block' : 'none';
        }
    }

    function loadMorePosts() {
        if (loading || !nextPageUrl) {
            return;
        }

        setLoading(true);

        fetch(nextPageUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                Accept: 'application/json',
            },
            credentials: 'same-origin',
        })
            .then(function (response) {
                if (!response.ok) {
                    throw new Error('HTTP ' + response.status);
                }
                return response.json();
            })
            .then(function (data) {
                var html = data && data.posts ? String(data.posts).trim() : '';
                if (html !== '') {
                    postContainer.insertAdjacentHTML('beforeend', html);
                }

                nextPageUrl = data && data.next_page ? String(data.next_page) : '';
                if (nextPageInput) {
                    nextPageInput.value = nextPageUrl || '';
                }

                setLoading(false);

                if (!nextPageUrl) {
                    window.removeEventListener('scroll', handleScroll);
                    return;
                }

                // Si el viewport sigue cerca del fondo (pocas cards / pantalla alta), encadena.
                if (nearBottom()) {
                    window.requestAnimationFrame(loadMorePosts);
                }
            })
            .catch(function (error) {
                console.error('Error cargando más posts:', error);
                setLoading(false);
            });
    }

    function handleScroll() {
        if (nearBottom()) {
            loadMorePosts();
        }
    }

    window.addEventListener('scroll', handleScroll, { passive: true });

    // Primera página corta: cargar sin esperar scroll.
    if (nextPageUrl && nearBottom()) {
        loadMorePosts();
    }
};

FGS.ready(FGS.initPostsInfinite);
