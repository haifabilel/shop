<?php
require_once ('connexion.php');
require_once ('../templates/head.php');
require_once ('../administration/header_ad.php');
?>
<div class="container_message">
      <h2 class="title_message">liste des messages</h2>
      <table class="cinereousTable"></th>
<thead>
<tr>
    <th>Nom complet</th>
    <th>Adresse email</th>
    <th>Portable</th>
    <th>Message</th>

</tr>
</thead>
         <tbody>
    <!-- Parcourir la liste des messages -->
    <?php
     $req =$conn->query('SELECT * FROM contact_clients');
     while($user = $req->fetch()){
        ?>
        <tr>
        <td><?=$user['nom_complet']?></td>
        <td><?=$user['email']?></td>
        <td><?=$user['portable']?></td>
        <td><?=$user['message']?></td>
        </tr>
      
        <?php 
     };
    ?>
   </tbody>
 </table>
</section>
<?php require_once ('../templates/footer.php'); ?>