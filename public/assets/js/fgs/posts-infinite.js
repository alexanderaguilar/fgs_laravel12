window.FGS = window.FGS || {};

FGS.initPostsInfinite = function () {
    var postContainer = document.getElementById('post-container');
    var nextPageInput = document.getElementById('next-page-url');
    if (!postContainer || !nextPageInput) {
        return;
    }

    var loading = false;
    var loadingIndicator = document.getElementById('loading');
    var nextPageUrl = nextPageInput.value;

    function loadMorePosts() {
        if (loading || !nextPageUrl) {
            return;
        }
        loading = true;
        if (loadingIndicator) {
            loadingIndicator.style.display = 'block';
        }

        fetch(nextPageUrl, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if (data.posts && data.posts.trim() !== '') {
                    postContainer.insertAdjacentHTML('beforeend', data.posts);
                    nextPageUrl = data.next_page;
                    loading = false;
                } else {
                    nextPageUrl = null;
                    window.removeEventListener('scroll', handleScroll);
                }
                if (loadingIndicator) {
                    loadingIndicator.style.display = 'none';
                }
            })
            .catch(function (error) {
                console.error('Error cargando más posts:', error);
                if (loadingIndicator) {
                    loadingIndicator.style.display = 'none';
                }
                loading = false;
            });
    }

    function handleScroll() {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100) {
            loadMorePosts();
        }
    }

    window.addEventListener('scroll', handleScroll);
};

FGS.ready(FGS.initPostsInfinite);
