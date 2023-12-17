<?php 
require_once 'head.php';
require_once 'header.php';
require_once '../administration/connexion.php';
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