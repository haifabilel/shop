<?php 
require_once 'head.php';
?>
<header class="header">
    <div class="flex">
        <a href="index.php">
            <img src="../uploads/images/Logo1.png" class="logo" alt="img_logo">
        </a>
        <nav class="navbar">
            <a href="../index.php">Accueil</a>
            <a href="articles.php">Articles</a>
            <a href="donner_avis.php">Vos avis</a>
            <a href="contact.php">Contact</a>
        </nav>
        <div class="icons">
            <i class="bi bi-person-fill" id="user-btn"></i>
            <?php
             require_once '../administration/connexion.php';
             $req = $conn->query("SELECT * FROM `cart`");
             $row = $req->rowCount();
       ?>
            <a href="wishlist.php" class="cart-btn"><i class="bi bi-suit-heart-fill"></i><sup class="sup_header">0</sup></a>
            <a href="panier.php" class="cart-btn"><i class="bi bi-cart-fill"></i><sup class="sup_header"><?php echo $row;?></sup></a>
            <i class="bi bi-list" id="menu-btn"></i>
        </div>
        <div class="user-box">
            <a href="../administration/login.php" class="btn">Login</a>
            <a href="../administration/registre.php" class="btn">Registre</a>
            <form action="" method="post">
                <button type="submit" name="logout" class="logout-btn">logout</button>
            </form>
        </div>
    </div>
      <script src="../js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </header>

<script>
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
</script>
<!-- ... Autres scripts ... -->
