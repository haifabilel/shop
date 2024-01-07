<?php
require_once ('connexion.php');
session_start();

//recupération de l'id
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $id = (int)$_GET['id'];
    $recupReview = $conn->query('SELECT * FROM avis_clients WHERE id = :id');
    //Sécuriser contre les injections sql
    $recupReview->bindValue(":id", $id, PDO::PARAM_INT);
    $recupReview->execute();
    if($recupReview->rowCount() > 0){
        $SupprimReview = $conn->query('DELETE FROM avis_clients WHERE id = ?');
        $SupprimReview->execute(array($id));
        header('location:fetch_reviews.php');
    }
}

?>