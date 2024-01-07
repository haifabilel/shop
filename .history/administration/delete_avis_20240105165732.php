<?php
require_once ('connexion.php');
session_start();

//recupération de l'id
if(isset($_GET['review_id']) AND !empty($_GET['review_id'])){
    $id = (int)$_GET['review_id'];
    $recupReview = $conn->prepare('SELECT * FROM review_table WHERE review_id = :review_id');
    //Sécuriser contre les injections sql
    $recupReview->bindValue(":review_id", $id, PDO::PARAM_INT);
    $recupReview->execute();
    if($recupReview->rowCount() > 0){
        $SupprimReview = $conn->prepare('DELETE FROM review_table WHERE review_id = ?');
        $SupprimReview->execute(array($id));
        header('location:liste_avis.php');
    }
}

?>