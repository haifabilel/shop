<?php
require_once ('connexion.php');
require_once ('../templates/head.php');
 //Caster avec int
 $id =(int)$_GET['id'];
 $req =$conn->prepare("SELECT * FROM articles WHERE id =:id");
 //Sécuriser contre les injections sql
 $req->bindValue(':id', $id, PDO::PARAM_INT);
 $req->execute();
 $row = $req->fetch(PDO::FETCH_ASSOC);


if(isset($_POST['Update'])){
  extract($_POST);
  if(isset($titre) && isset($prix) && isset($description)  && isset($image)){
    //Modifier les information de l'article
    $req =$conn->query("UPDATE articles SET titre = '$titre' , prix = '$prix' , description = '$description', image = '$image' WHERE id = $id ");
    if($req){
      header('location:gerer_articles.php');
    }

  }
}
?>


<section>
  <div class="form-container">
    <form method="POST" style="margin-top: 3;" >
          <h2 class="modal-title fs-5" id="exampleModalToggleLabel">Update articles</h2>
    <div class="form-group mt-6">
        <input type="text" name="titre" value="<?php echo $row['titre']; ?>"  class="form-control form_update"  placeholder="Titre de l'article" required><br>
    </div>
    <div class="form-group">
        <input type="text" name="prix" value="<?php echo $row['prix']; ?>"  class="form-control form_update"  placeholder="Prix de l'article" required><br>
    </div>
    <div class="form-group">
      <textarea type="text" class="form-control form_update" name="description" value="<?php echo $row['description']; ?>" placeholder="Description..." required></textarea><br>
    </div>
    <div class="form-group mb-3">
        <input type="file" name="image"  class="form-control" >
    </div>
    <div class="modal-footer">
        <button type="submit" name="Update" class="btn btn-primary" >Update</button>
    </div>
  </form>
 </div>
</section>