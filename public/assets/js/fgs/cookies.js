window.FGS = window.FGS || {};

FGS.setCookie = function (name, value, expires) {
    var date = new Date();
    date.setTime(date.getTime() + expires * 24 * 60 * 60 * 1000);
    var isSecure = location.protocol === 'https:' ? ';secure' : '';
    document.cookie = name + '=' + value + ';expires=' + date.toUTCString() + ';path=/' + isSecure + ';SameSite=Strict';
};

FGS.getCookie = function (name) {
    var cookieName = name + '=';
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf(cookieName) === 0) {
            return cookie.substring(cookieName.length, cookie.length);
        }
    }
    return '';
};

FGS.initCookies = function () {
    if (FGS.getCookie('cookieAccept') === 'true') {
        return;
    }

    var cookieFooter = document.createElement('footer');
    cookieFooter.style.position = 'fixed';
    cookieFooter.style.bottom = '0';
    cookieFooter.style.width = '100%';
    cookieFooter.style.backgroundColor = '#f0f0f0';
    cookieFooter.style.padding = '30px';
    cookieFooter.style.textAlign = 'center';
    cookieFooter.style.zIndex = '99999999';

    var cookieMessage = document.createElement('span');
    cookieMessage.innerHTML = 'Este sitio web utiliza cookies para garantizar que obtenga la mejor experiencia en la navegación y consulta de nuestro contenido. <a href="/storage/documents/FGS-Aviso-de-Privacidad.pdf" target="_blank">Leer más</a>';
    cookieMessage.style.fontSize = '14px';

    var cookieAcceptButton = document.createElement('button');
    cookieAcceptButton.innerHTML = 'Entendido';
    cookieAcceptButton.className = 'btn btn-primary ms-3';
    cookieAcceptButton.addEventListener('click', function () {
        FGS.setCookie('cookieAccept', 'true', 90);
        cookieFooter.style.display = 'none';
    });

    cookieFooter.appendChild(cookieMessage);
    cookieFooter.appendChild(cookieAcceptButton);
    document.body.appendChild(cookieFooter);
};
