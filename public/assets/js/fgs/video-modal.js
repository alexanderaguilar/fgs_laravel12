window.FGS = window.FGS || {};

FGS.openVideoModal = function (videoId) {
    var videoModal = document.getElementById('videoModal');
    var videoIframe = document.getElementById('videoIframe');
    if (!videoModal || !videoIframe || !videoId) {
        return;
    }
    videoIframe.src = 'https://www.youtube.com/embed/' + videoId + '?enablejsapi=1';
    videoModal.style.display = 'block';
    document.body.style.overflow = 'hidden';
};

FGS.closeVideoModal = function () {
    var videoModal = document.getElementById('videoModal');
    var videoIframe = document.getElementById('videoIframe');
    if (!videoModal || !videoIframe) {
        return;
    }
    videoIframe.src = '';
    videoModal.style.display = 'none';
    document.body.style.overflow = 'auto';
};

FGS.initVideoModal = function () {
    document.addEventListener('click', function (event) {
        var openEl = event.target.closest('[data-video-id]');
        if (openEl) {
            event.preventDefault();
            FGS.openVideoModal(openEl.getAttribute('data-video-id'));
            return;
        }
        if (event.target.closest('[data-action="close-video"]')) {
            event.preventDefault();
            FGS.closeVideoModal();
        }
    });
};
