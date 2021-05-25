<?php 
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Utilisateur.php');

$utilisateur = new Utilisateur();


if (isset($_GET["token"])) {
    $email = $utilisateur->verifierToken($_GET["token"]);
    
    if ($email == false) {
        header("Location: ../connexion.php?error=tokenIntrouvable");
        exit();
    }else{
        $_SESSION["email"]= $email;
        header("Location: ../carte.php?error=emailValidee");
        exit();
    }
    
}else{
    header("Location: ../connexion.php?error=noToken");
    exit();
}
