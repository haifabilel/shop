<?php
require_once ('connexion.php');
require_once ('../templates/head.php');
require_once ('../administration/header_ad.php');
?>
<div class="container_card my-5">
      <h2>liste des messages</h2>
      <table class="blueTable table-responsive">
         <thead>
           <tr>
            <th>Nom complét</th>
            <th>Adresse mail</th>
            <th>Portable</th>
            <th>Message</th>
           </tr>
         </thead>
         <tbody>
    <!-- Parcourir la liste des messages -->
    <?php
     $req =$conn->query('SELECT * FROM contact_c');
     while($user = $req->fetch()){
        ?>
        <tr>
        <td><?=$user['nom']?></td>
        <td><?=$user['prenom']?></td>
        <td><?=$user['mail']?></td>
        <td><?=$user['portable']?></td>
        <td><?=$user['message']?></td>
        </tr>
      
        <?php 
     };
    ?>
   </tbody>
 </table>
</section>