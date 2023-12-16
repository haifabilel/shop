<?php 
require_once'head.php';
requi

?>
<header>
    <div class="flex">
        <a href="index.php">
            <img class="logo" src="logo" alt="img_logo">
        </a>
        <nav class="navbar">
            <a href="index.php">Accueil</a>
            <a href="view_products.php">Nos articles</a>
            <a href="order.php">Commandes</a>
            <a href="about.php">About us</a>
            <a href="contact.php">Contact</a>
        </nav>
        <div class="icons">
            <i class="bx bxs-user" id="user-btn"></i>
            <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"></i><sup>0</sup></a>
            <a href="cart.php" class="cart-btn"><i class="bx bx-download"></i><sup>0</sup></a>
            <i class="bx bx-list-plus" id="menu-btn"></i>
        </div>
        <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="login.php" class="btn">Login</a>
            <a href="registre.php" class="btn">Registre</a>
            <form action="" method="post">
                <button type="submit" name="logout" class="logout-btn">logout</button>
            </form>
        </div>
    </div>
</header>