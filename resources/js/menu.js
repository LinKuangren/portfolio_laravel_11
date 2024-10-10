// Script exécuté une fois que le document est prêt
document.addEventListener('DOMContentLoaded', function() {
    Menu();
});


// Fonction menu profil
function Menu() {
    const burger = document.getElementById('burger');
    const menu = document.getElementById('menu');

    burger.addEventListener('click', function(event) {
        event.stopPropagation(); // Empêcher la propagation du clic à l'extérieur de l'image
        if (menu.style.display === 'flex') {
            menu.style.display = 'none'; // Cacher le menu s'il est déjà ouvert
            burger.style.marginLeft = '1rem';
        } else {
            menu.style.display = 'flex'; // Afficher le menu s'il est caché
            burger.style.marginLeft = '15rem';
        }
    });

    // Fermer le menu si l'utilisateur clique en dehors
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 1024) {
            if (event.target !== burger && event.target !== menu) {
                menu.style.display = 'none'; // Cacher le menu si l'utilisateur clique en dehors
                burger.style.marginLeft = '1rem';
            }
        }
    });
}