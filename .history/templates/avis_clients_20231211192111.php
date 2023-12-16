<?php 
require_once 'head.php';
?>
<section>
    <div class="testimonial-container">
        <div class="title">
            <h2>Vos avis</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, ducimus.</p>
        </div>
            <div class="container">
                <div class="testimonial-item active">
                    <img src="../uploads/images/img-1.jpg" alt="img_1">
                    <h3>title1</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="testimonial-item">
                    <img src="./uploads/images/img-2.jpg" alt="img_2">
                    <h3>title2</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="testimonial-item">
                    <img src="../uploads/images/img-3.jpg" alt="img_3">
                    <h3>title3</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
               
                <div class="left-arrow" onclick="nextSlide()"><i class="bi bi-arrow-left-circle"></i></div>
                <div class="right-arrow" onclick="prevSlide()"><i class="bi bi-arrow-right-circle"></i></div>
            </div>
    </div>
</section>
<script src="./js/slider.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>