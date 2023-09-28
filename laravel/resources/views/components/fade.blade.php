<script>
    /********** MESSAGE **********/
    setTimeout(function() {
        let messageElement = document.querySelector('.message');
        if (messageElement) {
            messageElement.classList.add('fadeOut'); // Ajoute la classe pour l'animation de fondu
        }
    }, 5000); // Délai initial de 5 secondes

    // Supprime l'élément après la fin de l'animation de fondu
    setTimeout(function() {
        let messageElement = document.querySelector('.message');
        if (messageElement) {
            messageElement.remove();
        }
    }, 6000); // Délai total de 6 secondes (y compris l'animation)
</script>
