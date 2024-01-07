
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
            <p> Votre nom complét : <span>".$name."</span> </p>
            <p> Votre numéro portable : <span>".$number."</span> </p>
            <p> Votre email : <span>".$email."</span> </p>
            <p> Votre addresse : <span>".$flat.", ".$street.", ".$country."</span> </p>
            <p> Votre mode de payement : <span>".$method."</span> </p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }
}

?>


</html>