
 // Fonction pour mettre à jour le nombre d'articles dans le panier
 function updateCartCount() {
    $.ajax({
        url: 'update_cart_count.php', // Remplacez ceci par le chemin correct vers le fichier de mise à jour
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            // Mettez à jour le contenu de la balise sup_header
            $('.sup_header').text(response.cartCount);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

// Appeler la fonction de mise à jour au chargement de la page
$(document).ready(function() {
    updateCartCount();
});