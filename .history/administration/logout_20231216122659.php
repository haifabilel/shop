<?php
require_once ('connexion.php');
require_once ('../templates/head.php');
require_once ('../administration/header_ad.php');
session_start();
$_SESSION = array();
session_destroy();
header('location:login.php');
?>