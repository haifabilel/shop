<?php

require_once '../administration/connexion.php';
require_once 'head.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street']; 
   $country = $_POST['country'];

   $query =$conn->query("SELECT * FROM `cart`");
   $price_total = 0;
   if ($query->rowCount() > 0){
      while($product_item =$query->fetch()){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query =$conn->query("INSERT INTO `orders`(name, number, email, method, flat, street, country, total_products, total_price) 
   VALUES('$name','$number','$email','$method','$flat','$street','$country','$total_product','$price_total')");

   if($query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$country."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='paypal.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<body>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Finaliser votre commande</h1>

   <form action="" method="post">
   <div class="display-order">
   <h4>Resumé panier</h4>
      <?php
         $select_cart =$conn->query("SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if($select_cart-> rowCount()> 0){
            while($fetch_cart =$select_cart-> fetch()){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <input type="text" placeholder="Entrer votre nom et prénom" name="name" required>
         </div>
         <div class="inputBox">
            <input type="text" placeholder="Entrer votre numéro portable" name="number" required>
         </div>
         <div class="inputBox">
            <input type="email" placeholder="Entrer votre adresse email" name="email" required>
         </div>
         <div class="inputBox">
            <select name="method">
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <input type="text" placeholder="address line 1" name="flat" required>
         </div>
         <div class="inputBox">
            <input type="text" placeholder="Rue" name="street" required>
         </div>
         <div class="inputBox">
            <input type="text" placeholder="Pays" name="country" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn mt-2" id="btn_check">
   </form>

</section>

</div>

<!-- Modal ajouter articles-->
<div class="modal fade" id="ajouterArticles" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalToggleLabel">Ajouter article</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
  </div>
  <div class="modal-footer">
  <button type="submit" name="addArticle" class="btn btn-primary" >Valider</button>
  </div>
</div>
</div>
</div>
<script src="js/script.js"></script>
   
</body>
</html>