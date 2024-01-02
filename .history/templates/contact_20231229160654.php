<?php 
require_once 'head.php';
require_once 'header.php';

if (isset($_POST['submit'])) {
    //Echapper les caractére spéciaux avec htmlspecialchars
    $nom = htmlspecialchars($_POST['nom_complet'], ENT_QUOTES);
    $mail= htmlspecialchars($_POST['mail'], FILTER_VALIDATE_EMAIL);
    $portable =htmlspecialchars($_POST['portable'], ENT_QUOTES);
    $message= htmlspecialchars($_POST['message'], ENT_QUOTES);
    $datetime= time();
  
    $query = "INSERT INTO contact_clients (nom, prenom, mail, portable, message,time)
     VALUES ('$nom','$mail','$portable','$message','$datetime')";
     $statement = $conn->prepare($query);
     $stat = $statement->execute();
     $errors[] = "Message envoyé l'administrateur va vous répondre dans les brefs délais";
      
};
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
                    <input type="text" name="nom_complet" placeholder=" Nom complét" required>
                </div>
                <div class="input-field">
                    <p>Adresse email<sup>*</sup></p>
                    <input type="email" name="email" placeholder=" Adresse email" required>
                </div>
                <div class="input-field">
                    <p>Portable<sup>*</sup></p>
                    <input type="text" name="portable" placeholder=" Portable" required>
                </div>
                <div class="input-field">
                    <p>Votre message<sup>*</sup></p>
                    <textarea type="text" name="message" placeholder="Votre message..." required></textarea>
                </div>
                <button type="submit" name="submit" class="btn">Envoyer</button>
            </form>
        </div>
    </div>
</section>
<?php 
require_once 'footer.php';
?>