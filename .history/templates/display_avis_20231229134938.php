<?php 
require_once 'head.php';
require_once './administration/connexion.php';
?>
<section>
    <div class="testimonial-container">
        <div class="title">
            <h2>Vos avis</h2>
            <?php
                $req = $conn->query('SELECT * FROM avis_clients WHERE user_rating > 2');
                while($user = $req->fetch()){
        ?>
        </div>
            <div class="container">
                <div class="testimonial-item active">
                    <div class="card-header"><?=$user['user_rating']?>
                    <i class="fas fa-star avis"></i>
                    </div>
                    <h3><?=$user['user_name']?></h3>
                    <p><?=$user['user_review']?></p>
                    <div class="card-footer text-body-secondary"><?=date('l jS, F Y h:i:s A', $user["datetime"])?></div>
                </div>
              
                <div class="left-arrow" onclick="nextSlide()"><i class="bi bi-arrow-left-circle"></i></div>
                <div class="right-arrow" onclick="prevSlide()"><i class="bi bi-arrow-right-circle"></i></div>
            </div>
            <?php 
              }
            ?>
    </div>
</section>
<script src="./js/slider.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
