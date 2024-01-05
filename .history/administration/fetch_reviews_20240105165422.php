<?php
require_once ('connexion.php');
require_once ('header_ad.php');
require_once ('../templates/head.php')
?>
<section class="mt-4">
   <!-- Afficher tous les membres enregistrés  -->
   <div class="container_user">
     <h2>liste des avis clients</h2>
     <table class="cinereousTable">
      <thead>
            <tr>
            <th>Nom</th>
            <th>Rating</th>
            <th>Avis</th>
            <th>Date</th>
            <th>Action</th>
            </tr>
      </thead>
    <!-- Parcourir la liste des avis -->
    <?php
     require_once ('connexion.php');
     $req = $conn->query('SELECT * FROM avis_clients');
     while($user = $req->fetch()){
        ?>
        <tr>
            <td><?=$user['user_name']?></td>
            <td><?=$user['user_rating']?></td>
            <td><?=$user['user_review']?></td>
            <td><?=date('l jS, F Y h:i:s A', $user["datetime"])?></td>
            <td>
            <a class="btn btn-primary mb-2 mt-2" href="supprimer_avis.php?review_id=<?=$user['id']?>"> <i class="fa-regular fa-trash-can"></i></a>
            </td>
        </tr>
        <?php 
     }
    ?>
   </tbody>
  </table>
 </div>
</section>