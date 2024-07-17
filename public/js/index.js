document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('myform');
    const email = document.getElementById('login');
    const passwd = document.getElementById('passwd');
    const errorsDiv = document.getElementById('error-message');
    const button = document.getElementById('envoyer');

    form.addEventListener('input', validateForm);
    form.addEventListener('submit', function(event) {
        validateForm();
        if (button.disabled) {
            event.preventDefault();
        }
    });

    function validateForm() {
        errorsDiv.innerHTML = '';
        let hasErrors = false;

        if (email.value.trim() === '') {
            displayError('Le champ identifiant est obligatoire.');
            hasErrors = true;
        }

        if (passwd.value.trim() === '') {
            displayError('Le champ mots de passe est obligatoire.');
            hasErrors = true;
        }

        button.disabled = hasErrors;
    }

    function displayError(errorMessage) {
        const errorPara = document.createElement('p');
        errorPara.classList.add('error');
        errorPara.textContent = errorMessage;
        errorsDiv.appendChild(errorPara);
    }
});
