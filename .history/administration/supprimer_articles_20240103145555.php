<?php
require_once ('connexion.php');
session_start();

//recupération de l'id
if(isset($_GET['id']) AND !empty($_GET['id'])){
    //Caster avec int
    $id =(int)$_GET['id'];
    $recupCard = $conn->prepare('SELECT * FROM services WHERE id = :id');
    //Sécuriser contre les injections sql
    $recupCard->bindValue(":id", $id, PDO::PARAM_INT);
    $recupCard->execute();
    if($recupCard->rowCount() > 0){
        $supprimCard = $conn->prepare('DELETE FROM services WHERE id = ?');
        $supprimCard->execute(array($id));
        header('location:fetch_service.php');
    }
}

?>