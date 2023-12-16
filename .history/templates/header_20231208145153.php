<?php 
require_once 'head.php';

?>
<header class="header">
    <div class="flex">
        <a href="index.php">
            <img src="../uploads/images/Logo (1).png" class="logo" alt="img_logo">
        </a>
        <nav class="navbar">
            <a href="../index.php">Accueil</a>
            <a href="articles.php">Articles</a>
            <a href="order.php">Commandes</a>
            <a href="about.php">About us</a>
            <a href="contact.php">Contact</a>
        </nav>
        <div class="icons">
            <i class="bi bi-person-fill" id="user-btn"></i>
            <a href="wishlist.php" class="cart-btn"><i class="bi bi-suit-heart-fill"></i><sup>0</sup></a>
            <a href="cart.php" class="cart-btn"><i class="bi bi-cart-fill"></i><sup>0</sup></a>
            <i class="bi bi-list" id="menu-btn"></i>
        </div>
        <div class="user-box">
            <!-- <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p> -->
            <a href="login.php" class="btn">Login</a>
            <a href="registre.php" class="btn">Registre</a>
            <form action="" method="post">
                <button type="submit" name="logout" class="logout-btn">logout</button>
            </form>
        </div>
    </div>
    <script src="../script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</header>