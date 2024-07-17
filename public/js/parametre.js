
        function showContent(contentId, linkId) {
            const contents = document.querySelectorAll('.hidden-content');
            contents.forEach(content => content.classList.remove('visible'));

            document.getElementById(contentId).classList.add('visible');

            const links = document.querySelectorAll('.links div');
            links.forEach(link => link.classList.remove('active'));

            document.getElementById(linkId).classList.add('active');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const brightnessSlider = document.getElementById('brightness');
            const volumeSlider = document.getElementById('volume');
            const fontSizeSlider = document.getElementById('fontSize');
            const contrastSlider = document.getElementById('contrast');
            const brightnessValue = document.getElementById('brightnessValue');
            const volumeValue = document.getElementById('volumeValue');
            const fontSizeValue = document.getElementById('fontSizeValue');
            const contrastValue = document.getElementById('contrastValue');

            brightnessSlider.addEventListener('input', () => {
                brightnessValue.textContent = brightnessSlider.value;
            });

            volumeSlider.addEventListener('input', () => {
                volumeValue.textContent = volumeSlider.value;
            });

            fontSizeSlider.addEventListener('input', () => {
                fontSizeValue.textContent = fontSizeSlider.value + 'px';
                document.body.style.fontSize = fontSizeSlider.value + 'px';
            });

            contrastSlider.addEventListener('input', () => {
                contrastValue.textContent = contrastSlider.value;
                document.body.style.filter = `contrast(${contrastSlider.value})`;
            });
        });
