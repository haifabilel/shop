<?php 
require_once 'head.php';
require_once 'header.php';
require_once '../administration/connexion.php';

//ajouter articles dans wishlist
if (isset($_POST['add_wishlist'])) {
   $id= $_GET['id'];
   $product_id= $_POST['product_id'];

   $wishlist = $conn->prepare("SELECT *FROM wishlist WHERE user_id = ? AND product_id =?");
   $wishlist-> execute([$user_id, $product_id]);

   $cart_num =$conn->prepare("SELECT *FROM cart WHERE user_id = ? AND product_id =?");
   $cart_num ->execute([$user_id, $product_id]);

   if ($wishlist->rowCount() > 0) {
     $errors = 'produit exist déja dans wishlist';
   }elseif ($cart_num->rowCount() > 0) {
    $errors = 'produit exist déja dans votre panier';
   }else {
    $select_price = $conn->prepare("SELECT* FROM articles WHERE id =? LIMIT 1");
    $select_price->execute([$product_id]);
    $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

    $insert_wish= 
   }
}
?>
<section class="articles_section">
    <h2 class="title_articles">Nos articles</h2>
    <div class="separator">
        <div class="hr-circle">
            <hr class="ligne">
        </div>
            <i class="fa-solid fa-circle fa-bounce fa-sm" style="color: #80005e;"></i>
        <div class="hr-circle">
        <hr class="ligne">
    </div>
</div>
    <div class="thumb">
        <div class="box-container">
        <?php
            $req = $conn->query('SELECT * FROM articles');
            while($user = $req->fetch()){
        ?>
            <div class="box">
                <img src="../uploads/<?php echo $user['image']; ?>" class="img_article" alt="img_article">
                <h3><?php echo $user['titre']; ?> </h3>
                <p>Prix :<?php echo $user['prix']; ?> €</p>
                <input type="hidden" name="product_id" value="<?=$user['id']; ?>">
                <div class="fles">
                    <input type="number" name="quantité" placeholder="quantité" required min="1" max="99" maxlength="2" class="quantité">
                </div>
                <div class="button">
                    <button type="submit" name="add_cart"><i class="bi bi-cart-plus-fill"></i></button>
                    <button type="submit" name="add_wishlist"><i class="bi bi-heart-fill"></i></button>
                    <button type="submit" name="voir_article"><i class="bi bi-eye-fill"></i></button>
                    <a href="details_article.php?id=<? echo $user['id']; ?>"></a>
                </div>
            </div>
            <?php 
       };
    ?>
</section>
<!-- ========section articles ends=========  -->
<?php require_once 'footer.php' ?>