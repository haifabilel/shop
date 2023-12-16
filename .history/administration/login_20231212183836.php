<?php
require_once ('connexion.php');
require_once ('../templates/head.php');
require_once ('../templates/header.php');
?>
<section class="registre-section">
  <h2>Login now</h2>
  <div class="form-container">
            <form action="" method="post">
                <div class="title">
                    <img src="../uploads/images/Logo1.png" alt="" class="logo">
                </div>
                <div class="input-field">
                    <p>Adresse email<sup>*</sup></p>
                    <input type="email" name="email" placeholder=" Adresse email" required>
                </div>
                <div class="input-field">
                    <p>Password<sup>*</sup></p>
                    <input type="password" name="password" placeholder=" Votre password" required>
                </div>
                <div class="input-field">
                    <p>Confirmer password<sup>*</sup></p>
                    <input type="password" name="cpassword" placeholder=" Confirmer votre password" required>
                </div>
                <button type="submit" name="submit" class="btn mt-4">Valider</button>
            </form>
        </div>
</section>

<?php
require_once '../templates/footer.php';
?>