<?php
require_once ('connexion.php');
require_once ('../templates/head.php');
require_once ('../administration/header_ad.php');


//Ajouter service depuis le dashbord admin
if(isset($_POST['addService'])){
    $titre = $_POST['titre'];
    $desc = $_POST['description'];
    $prix = $_POST['prix'];
    $image = $_FILES['image'];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "../uploads/".$img_name;
    move_uploaded_file($img_loc,'../uploads/'.$img_name);
// Sécuriser contre les injections SQL
    $query = "INSERT INTO articles (titre ,description,prix, image)
    VALUES (:titre, :description,:prix, :image)";
    $statement = $conn->prepare($query);
  
    $data = [
        ':titre' => $titre,
        ':description' => $desc,
        ':prix' => $prix,
        ':image' => $img_des,
    ];
    $stat = $statement->execute($data);
    header('location:administrateur.php');
};

?>

<section class="articles_section">
  <!-- Afficher la liste des services enregistrés dans ma bdd -->
<div class="container_card my-6">
  <h2 class="title_articles">liste des services</h2>
  <button class="btn btn-primary ajouter_articles" data-bs-toggle="modal" data-bs-target="#ServiceAdmin">Ajouter services <i class="fa-solid fa-circle-plus" style="color: #ffffff;"></i> </button>
<table class="cinereousTable"></th>
<thead>
<tr>
      <th class="th_image">Image</th>
      <th>Titre</th>
      <th>prix</th>
      <th>Description</th>
      <th>Action</th>

</tr>
</thead>
<tbody>
<!-- Parcourir la liste des services -->
<?php
     $req = $conn->query('SELECT * FROM articles');
     while($user = $req->fetch()){
        ?>
        <tr>
        <td><img class="img_service" src="../uploads/<?php echo $user['image']; ?>" alt="image_card"></td>
        <td><?=$user['titre']?></td>
        <td><?=$user['prix']?></td>
        <td><?=$user['description']?></td>
        <td>
        <a class="btn btn-primary" href="update_service.php?id=<?=$user['id']?>" ><i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i></a><br><br>
        <a class="btn btn-primary" href="supprimer_service.php?id=<?=$user['id']?>"><i class="fa-regular fa-trash-can"></i></a>
        </td>
        </tr>
      
        <?php 
     };
    ?>
  </tbody>
</table>
</section>
  
<!-- Modal ajout service-->
<div class="modal fade" id="ServiceAdmin" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
  <form  method="POST" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalToggleLabel">Ajouter service</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-group">
       <input type="text" name="titre" class="form-control"  placeholder="Titre" required><br>
      </div>
      <div class="form-group">
       <input type="text" name="prix" class="form-control"  placeholder="prix" required><br>
      </div>
      <div class="form-group">
    <textarea class="form-control" name="description" placeholder="Description..."required></textarea><br>
  </div>
  <div class="form-group mb-3">
  <input type="file" name="image" class="form-control">
</div>
      
      </div>
      <div class="modal-footer">
      <button type="submit" name="addService" class="btn btn-primary" >Valider</button>
      </div>
    </div>
     </form>
  </div>
</div>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>