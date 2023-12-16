<?php 
require_once 'head.php';
require_once 'header.php';
?>
<section class="contact_section">
<h2>Contacter nous</h2>
    <div class="main-container">
        <div class="form-container">
            <form action="" method="post">
                <div class="title">
                    <img src="../uploads/images/Logo1.png" alt="" class="logo">
                </div>
                <div class="input-field">
                    <p>Nom complét<sup>*</sup></p>
                    <input type="text" name="name">
                </div>
                <div class="input-field">
                    <p>Adresse email<sup>*</sup></p>
                    <input type="email" name="email">
                </div>
                <div class="input-field">
                    <p>Portable<sup>*</sup></p>
                    <input type="text" name="portable">
                </div>
                <div class="input-field">
                    <p>Votre message<sup>*</sup></p>
                    <textarea type="text" name="message"></textarea>
                </div>
                <button type="submit" name="submit" class="btn">Envoyer</button>
            </form>
        </div>
    </div>
</section>
<?php 
require_once 'footer.php';
?>