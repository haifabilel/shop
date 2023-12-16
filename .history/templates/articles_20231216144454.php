<?php 
require_once 'head.php';
require_once 'header.php';
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
<?php
     $req = $conn->query('SELECT * FROM articles');
     while($user = $req->fetch()){
        ?>
    <div class="thumb">
        <div class="box-container">
            <div class="box">
                <img src="src="../uploads/images<?php echo $user['image']; ?>" class="img_article" alt="article1">
                <h3>titre : </h3>
                <p>Prix : €</p>
                <div class="button">
                    <button type="submit" name="add_to_cart"><i class="bi bi-plus-circle"></i></button>
                    <button type="submit" name="add_to_wishlist"><i class="bi bi-heart-fill"></i></button>
                    <a href="details_article.php?id=<? echo $user['id']; ?>"></a>
                </div>
                <input type="hidden" name="product_id" value="<?=$user['id']; ?>">
                <div class="fles">
                    <input type="number" name="quantité" required min="1" max="99" maxlength="2" class="quantité">
                </div>
                <button class="btn">Shop now</button>
            </div>
            <?php 
       };
    ?>
</section>
<!-- ========section articles ends=========  -->
<?php require_once 'footer.php' ?>