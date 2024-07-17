document.querySelectorAll('.input-container input').forEach(function(input) {
    input.addEventListener('input', function() {
        if (input.value.trim() !== '') {
            input.nextElementSibling.style.display = 'none';
        } else {
            input.nextElementSibling.style.display = 'inline';
        }
    });
});
