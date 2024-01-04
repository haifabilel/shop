<?php
require_once '../administration/connexion.php';

// Vérifiez la connexion à la base de données et d'autres configurations

// Effectuez la requête pour obtenir le nombre d'articles dans le panier
$req = $conn->query("SELECT COUNT(*) as cartCount FROM `cart`");
$row = $req->fetch(PDO::FETCH_ASSOC);

// Retournez le résultat au format JSON
echo json_encode(['cartCount' => $row['cartCount']]);
?>
