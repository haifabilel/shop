<?php 
require_once '../administration/connexion.php';
session_start();
$user_id = $_SESSION['user_id'];
require_once 'head.php';
require_once 'header.php';

if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    $conn->query("UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'");
    $message[] = 'cart quantity updated successfully!';
 }
 
 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    $conn->query("DELETE FROM `cart` WHERE id = '$remove_id'");
    header('location:panier.php');
 }
   
 if(isset($_GET['delete_all'])){
    $conn->query("DELETE FROM `cart` WHERE user_id = '$user_id'");
    header('location:panier.php');
 }
?>
</div>
<div class="shopping-cart">
   <h2 class="heading">shopping cart</h2>
   <table class="cinereousTable"></th>
      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>
      <tbody>
      <?php
         $cart_query =$conn->query("SELECT * FROM `cart` WHERE user_id = '$user_id'");
         $grand_total = 0;
         if($cart_query->rowCount() > 0){
            while($fetch_cart = $cart_query->fetch()){
      ?>
         <tr>
            <td><img src="../uploads/<?php echo $fetch_cart['image']; ?>" width="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo $fetch_cart['price']; ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="update" class="option-btn">
               </form>
            </td>
            <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="index.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">grand total :</td>
         <td>$<?php echo $grand_total; ?>/-</td>
         <td><a href="index.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
      </tr>
   </tbody>
   </table>

   <div class="cart-btn">  
      <a href="#" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

</div>

</div>
