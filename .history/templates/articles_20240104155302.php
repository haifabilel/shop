<?php 
require_once '../administration/connexion.php';
session_start();
require_once 'head.php';
require_once 'header.php';

//ajouter articles dans wishlist

//ajouter articles dans cart
if(isset($_POST['add_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'product already added to cart!';
    }else{
       mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
       $message[] = 'product added to cart!';
    }
 
 };
 
 if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
 }
 
 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:index.php');
 }
   
 if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:index.php');
 }
 
 ?>
?>
<section class="articles_section" style="margin-top: 10%;">
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