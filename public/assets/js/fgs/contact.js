window.FGS = window.FGS || {};

FGS.initContact = function () {
    var form = document.querySelector('#contact-form');
    if (!form) {
        return;
    }
    var name = form.querySelector('#name');
    var email = form.querySelector('#email');
    var subject = form.querySelector('#subject');
    var message = form.querySelector('#message');
    var checkbox = form.querySelector('#check');

    function showError(input, msg) {
        var errorDiv = input.nextElementSibling;
        if (!errorDiv) {
            return;
        }
        errorDiv.innerText = msg;
        input.addEventListener('input', function () {
            errorDiv.innerText = '';
        }, { once: true });
    }

    function isValidEmail(value) {
        return /^[^@]+@[^@]+\.[^@]+$/.test(value);
    }

    function validateName() {
        if (name.value.trim() === '') {
            showError(name, 'Por favor ingrese su nombre.');
            return false;
        }
        return true;
    }

    function validateEmail() {
        var emailValue = email.value.trim();
        if (emailValue === '') {
            showError(email, 'Por favor ingrese su correo electrónico.');
            return false;
        }
        if (!isValidEmail(emailValue)) {
            showError(email, 'Por favor ingrese un correo electrónico válido.');
            return false;
        }
        return true;
    }

    function validateSubject() {
        if (subject.value.trim() === '') {
            showError(subject, 'Por favor ingrese el tema o título.');
            return false;
        }
        return true;
    }

    function validateMessage() {
        if (message.value.trim() === '') {
            showError(message, 'Por favor ingrese su mensaje.');
            return false;
        }
        return true;
    }

    function validateCheckbox() {
        if (!checkbox.checked) {
            showError(checkbox, 'Por favor acepte la política de protección de datos personales.');
            return false;
        }
        return true;
    }

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        document.querySelectorAll('[id$="-error"]').forEach(function (el) {
            el.innerText = '';
        });
        if (validateName() && validateEmail() && validateSubject() && validateMessage() && validateCheckbox()) {
            var submitBtn = document.getElementById('submit-btn');
            if (submitBtn) {
                submitBtn.value = 'Enviando...';
                submitBtn.style.pointerEvents = 'none';
                submitBtn.style.opacity = '0.6';
            }
            form.submit();
        }
    });
};

FGS.ready(FGS.initContact);
