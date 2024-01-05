<section class="section_avis">
<h2 class="mt-5">Vos avis</h2>
<?php
require_once ('connexion.php');
require_once ('head_admin.php');
     $req = $conn->query('SELECT * FROM review_table WHERE user_rating > 2');
     while($user = $req->fetch()){
        ?>
<div class="container-reviews">  
<div class="card text-center d-flex">
  <div class="card-header"><?=$user['user_rating']?>
    <i class="fas fa-star avis"></i>
</div>
  <div class="card-body">
    <h5 class="ca-title"><?=$user['user_name']?></h5>
    <p class="card-text"><?=$user['user_review']?></p>
  </div>
  <div class="card-footer text-body-secondary"><?=date('l jS, F Y h:i:s A', $user["datetime"])?></div>
</div>
</div> 

        <?php 
     }
    ?>
</section>