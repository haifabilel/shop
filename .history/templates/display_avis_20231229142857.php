<?php
require_once 'head.php';
require_once './administration/connexion.php';
?>

<section>
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $req = $conn->query('SELECT * FROM avis_clients WHERE user_rating > 2');
            $firstItem = true;
            while ($user = $req->fetch()) {
                ?>
                <div class="carousel-item <?php echo $firstItem ? 'active' : ''; ?>">
                    <div class="card testimonial-item">
                        <div class="card-header"><?=$user['user_rating']?>
                            <i class="fas fa-star avis"></i>
                        </div>
                        <h3><?=$user['user_name']?></h3>
                        <p><?=$user['user_review']?></p>
                        <div class="card-footer text-body-secondary"><?=date('l jS, F Y h:i:s A', $user["datetime"])?></div>
                    </div>
                </div>
                <?php
                $firstItem = false;
            }
            ?>
        </div>
        <a class="carousel-control-prev right-arrow" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next left-arrow" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<script src="./js/slider.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js" integrity="sha384-M6VI7oQFi28qtr5a9nD54tYP4FSc9oM5fZ+2p4uCiDB0/6Uq4PbcMZf+2by5YUVi" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyJq63SIZYG9pgBxqW1wESgEp9MBoh8q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
