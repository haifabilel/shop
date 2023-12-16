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
    <div class="thumb">
        <div class="box-container">
            <div class="box">
                <img src="../uploads/images/pack.jpg" class="img_article" alt="article1">
                <h3>Notre Pack</h3>
                <p>Prix : €</p>
                <div class="button">
                    <button type="submit" name="add_to_cart"><i class="bi bi-plus-circle"></i></button>
                    <button type="submit" name="add_to_wishlist"><i class="bi bi-heart-fill"></i></button>
                    <a href="details_article.php?id=<? echo $user['id']; ?>"></a>
                </div>
                <input type="hidden" name="product_id" value="<?=$user['id']; ?>">
                <div class="fles">
                    <input type="number" name="quantité" required min="1" max="99" maxlength="">
                </div>
                <button class="btn">Shop now</button>
            </div>
            <div class="box">
                <img src="../uploads/images/bubble.jpg" class="img_article" alt="article2">
                <h3>Bubble candle</h3>
                <p>Prix : €</p>
                <div class="button">
                    <button type="submit" name="add_to_cart"><i class="bi bi-plus-circle"></i></button>
                    <button type="submit" name="add_to_wishlist"><i class="bi bi-heart-fill"></i></button>
                    <a href="details_article.php?id=<? echo $user['id']; ?>"></a>
                </div>
                <input type="hidden" name="product_id" value="<?=$user['id']; ?>">
                <div class="fles">
                    <input type="number" name="quantité" required min="1" max="99" maxlength="">
                </div>
                <button class="btn">Shop now</button>
            </div>
            <div class="box">
                <img src="../uploads/images/pot.jpg" class="img_article" alt="article3">
                <h3>Candle Pot</h3>
                <p>Prix : €</p>
                 <div class="button">
                    <button type="submit" name="add_to_cart"><i class="bi bi-plus-circle"></i></button>
                    <button type="submit" name="add_to_wishlist"><i class="bi bi-heart-fill"></i></button>
                    <a href="details_article.php?id=<? echo $user['id']; ?>"></a>
                </div>
                <input type="hidden" name="product_id" value="<?=$user['id']; ?>">
                <div class="fles">
                    <input type="number" name="quantité" required min="1" max="99" maxlength="">
                </div>
                <button class="btn">Shop now</button>
            </div>
            <div class="box">
                <img src="../uploads/images/blanc.jpg" class="img_article" alt="article4">
                <h3>Candle déco</h3>
                <p>Prix : €</p>
                 <div class="button">
                    <button type="submit" name="add_to_cart"><i class="bi bi-plus-circle"></i></button>
                    <button type="submit" name="add_to_wishlist"><i class="bi bi-heart-fill"></i></button>
                    <a href="details_article.php?id=<? echo $user['id']; ?>"></a>
                </div>
                <input type="hidden" name="product_id" value="<?=$user['id']; ?>">
                <div class="fles">
                    <input type="number" name="quantité" required min="1" max="99" maxlength="">
                </div>
                <button class="btn">Shop now</button>
            </div>
            <div class="box">
                <img src="../uploads/images/sapin.jpg" class="img_article" alt="article5">
                <h3>Bubble candle</h3>
                <p>Prix : €</p>
                 <div class="button">
                    <button type="submit" name="add_to_cart"><i class="bi bi-plus-circle"></i></button>
                    <button type="submit" name="add_to_wishlist"><i class="bi bi-heart-fill"></i></button>
                    <a href="details_article.php?id=<? echo $user['id']; ?>"></a>
                </div>
                <input type="hidden" name="product_id" value="<?=$user['id']; ?>">
                <div class="fles">
                    <input type="number" name="quantité" required min="1" max="99" maxlength="">
                </div>
                <button class="btn">Shop now</button>
            </div>
            <div class="box">
                <img src="../uploads/images/cock.jpg" class="img_article" alt="article6">
                <h3>Bubble candle</h3>
                <p>Prix : €</p>
                 <div class="button">
                    <button type="submit" name="add_to_cart"><i class="bi bi-plus-circle"></i></button>
                    <button type="submit" name="add_to_wishlist"><i class="bi bi-heart-fill"></i></button>
                    <a href="details_article.php?id=<? echo $user['id']; ?>"></a>
                </div>
                <input type="hidden" name="product_id" value="<?=$user['id']; ?>">
                <div class="fles">
                    <input type="number" name="quantité" required min="1" max="99" maxlength="">
                </div>
                <button class="btn">Shop now</button>
            </div>
            <div class="box">
                <img src="../uploads/images/noel.jpg" class="img_article" alt="article7">
                <h3>Bubble candle</h3>
                <p>Prix : €</p>
                 <div class="button">
                    <button type="submit" name="add_to_cart"><i class="bi bi-plus-circle"></i></button>
                    <button type="submit" name="add_to_wishlist"><i class="bi bi-heart-fill"></i></button>
                    <a href="details_article.php?id=<? echo $user['id']; ?>"></a>
                </div>
                <input type="hidden" name="product_id" value="<?=$user['id']; ?>">
                <div class="fles">
                    <input type="number" name="quantité" required min="1" max="99" maxlength="">
                </div>
                <button class="btn">Shop now</button>
            </div>
            <div class="box">
                <img src="../uploads/images/packrose.jpg" class="img_article" alt="article8">
                <h3>Bubble candle</h3>
                <p>Prix : €</p>
                 <div class="button">
                    <button type="submit" name="add_to_cart"><i class="bi bi-plus-circle"></i></button>
                    <button type="submit" name="add_to_wishlist"><i class="bi bi-heart-fill"></i></button>
                    <a href="details_article.php?id=<? echo $user['id']; ?>"></a>
                </div>
                <input type="hidden" name="product_id" value="<?=$user['id']; ?>">
                <div class="fles">
                    <input type="number" name="quantité" required min="1" max="99" maxlength="">
                </div>
                <button class="btn">Shop now</button>
            </div>
        </div>
    </div>
</section>
<!-- ========section articles ends=========  -->
<?php require_once 'footer.php' ?>