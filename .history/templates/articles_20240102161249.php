<?php 
require_once 'head.php';
require_once 'header.php';
require_once '../administration/connexion.php';

// Assurez-vous que la session est démarrée et que $user_id est défini
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Ajouter un article à la wishlist
    if (isset($_POST['add_wishlist'])) {
        $id = uniqid();
        $product_id = $_POST['product_id'];

        $wishlist = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ? AND product_id =?");
        $wishlist->execute([$user_id, $product_id]);

        $cart_num = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
        $cart_num->execute([$user_id, $product_id]);

        if ($wishlist->rowCount() > 0) {
            $errors = 'Produit déjà existant dans la wishlist';
        } elseif ($cart_num->rowCount() > 0) {
            $errors = 'Produit déjà existant dans votre panier';
        } else {
            $select_price = $conn->prepare("SELECT * FROM articles WHERE id = ? LIMIT 1");
            $select_price->execute([$product_id]);
            $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

            $insert_wish = $conn->prepare('INSERT INTO wishlist (id, user_id,product_id, price) 
                VALUES (?,?,?,?)');
            $insert_wish->execute([$id, $user_id, $product_id, $fetch_price['prix']]);
            $errors = 'Produit ajouté à votre wishlist avec succès';
        }
    }

    // Affichage des articles
    ?>
    <section class="articles_section">
        <h2 class="title_articles">Nos articles</h2>
        <!-- ... Autres balises HTML ... -->
        <div class="thumb">
            <div class="box-container">
                <?php
                $req = $conn->query('SELECT * FROM articles');
                while ($article = $req->fetch()) {
                    ?>
                    <div class="box">
                        <!-- ... Autres balises HTML ... -->
                        <input type="hidden" name="product_id" value="<?= $article['id']; ?>">
                        <!-- Ajout du formulaire autour des boutons -->
                        <form method="post">
                            <div class="fles">
                                <input type="number" name="quantité" placeholder="quantité" required min="1" max="99"
                                    maxlength="2" class="quantité">
                            </div>
                            <div class="button">
                                <button type="submit" name="add_cart"><i class="bi bi-cart-plus-fill"></i></button>
                                <button type="submit" name="add_wishlist"><i class="bi bi-heart-fill"></i></button>
                                <button type="submit" name="voir_article"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </form>
                    </div>
                    <?php
                };
                ?>
            </div>
        </div>
    </section>
    <!-- ... Autres balises HTML ... -->
    <?php
}
require_once 'footer.php';
?>
