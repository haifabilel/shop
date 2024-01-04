<?php

require_once '../administration/connexion.php';
session_start();
$user_id = $_SESSION['user_id'];
require_once 'head.php';
require_once 'header.php';


if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart =$conn->query("SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'");

   if($select_cart->rowCount() > 0){
      $message[] = 'product already added to cart!';
   }else{
    $conn->query("INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart!';
   }

};
 
 ?>

<body>
   
<?php

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
      $select_product = $conn->query("SELECT * FROM `articles`");
         while($fetch_product = $select_product->fetch()){
   ?>
      <form method="post" class="box" action="">
         <img src="../uploads/<?php echo $fetch_product['image']; ?>" alt="img_art">
         <div class="name"><?php echo $fetch_product['name']; ?></div>
         <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
         <input type="number" min="1" name="product_quantity" value="1">
         <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn_article">
      </form>
   <?php
      };
   ?>
</section>
</body>
</html>