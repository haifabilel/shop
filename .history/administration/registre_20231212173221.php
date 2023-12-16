<?php
require_once ('connexion.php');
require_once ('../templates/head.php');
require_once ('../templates/header.php');


if(!empty($_POST)){
    $errors = array();

    if(empty($_POST['name']) || !preg_match('/^[a-zA-Z0-9_]+$/',$_POST['name'])){
        $errors['name'] = "Votre name n'est pas valide";
    }else{
        $req = $conn->prepare('SELECT id FROM employe  WHERE name = ?');
        $req->execute([$_POST['name']]);
        $user = $req-> fetch();
        if($user){
            $errors['name'] = 'Ce name est déja utilusé';

        };
    };

// Verfier le format de l'email
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] ="Votre email n'est pas valide";
    }else{
        $req = $conn->prepare('SELECT id FROM employe WHERE email = ?');
        $req-> execute([$_POST['email']]);
        $user = $req-> fetch();
        if($user){
            $errors['email'] = 'Cet email est déja utilusé';
        };
    };

//Verfier si le password est le meme password confirm
    if(empty($_POST['password']) || $_POST['password'] != $_POST['cpassword']){
        $errors['password'] ="Votre password n'est pas valide";
    };
//insertion donnée employé
    if(empty($errors)){
      $req = $conn->prepare("INSERT INTO employe SET name = ? ,email = ?,  password = ?, user_type = ? ");  
     //Crypter le mote de passe avec la methode BCrypt
      $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
      $req->execute([$_POST['name'],$_POST['email'], $password, $_POST['user_type']]);
      header('location:login_form.php');
    }; 
};
?>
<section class="registre-section">
  <h2>Registre now</h2>
  <div class="form-container">
            <form action="" method="post">
                <div class="title">
                    <img src="../uploads/images/Logo1.png" alt="" class="logo">
                </div>
                <div class="input-field">
                    <p>Nom complét<sup>*</sup></p>
                    <input type="text" name="name" placeholder=" Nom complét" required>
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
                    <p>Password<sup>*</sup></p>
                    <input type="text" name="password" placeholder=" Votre password" required>
                </div>
                <div class="input-field">
                    <p>Password<sup>*</sup></p>
                    <input type="text" name="password" placeholder=" Votre password" required>
                </div>
                <button type="submit" name="submit" class="btn mt-4">Envoyer</button>
            </form>
        </div>
</section>

<?php
require_once '../templates/footer.php';
?>