<?php
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Utilisateur.php');

$email = $_POST['email'];
$mdp = $_POST['mdp'];
$mdpconfirmation = $_POST['mdpconfirmation'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$user = new Utilisateur();
$users = $user->getUtilisateurs();

    if (!(isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['mdpconfirmation']) && isset($_POST['nom']) &&  isset($_POST['prenom']))) {
        header('Location: ../inscription.php');
        exit();
    }elseif (!$mdp === $mdpconfirmation) {
        header('Location: ../inscription.php?error=mdpDifferents');
        exit();
    }elseif ($user->emailExist($email)) {
        header('Location: ../inscription.php?error=emailExistant');
        exit();
    }elseif (strlen($mdpconfirmation) < 6) {
        header("Location: ../inscription.php?error=tropCourt");
        exit();
    }elseif (!preg_match("#[0-9]+#", $mdp)) {
        header('Location: ../inscription.php?error=mdpSansChiffre');
        exit();
    }elseif (!preg_match("#[a-zA-Z]+#", $mdp)) {
        header('Location: ../inscription.php?error=mdpSansLettre');
        exit();
    }else {
        $user->addUtilisateur(array("email" => $email,"mdp" => password_hash($mdp, PASSWORD_DEFAULT),"nom" => $nom,"prenom" => $prenom,"groupe" => 1,"avatar" => "default.svg","bio" => "Je suis nouveau sur CityQuest !"));
        header("Location: ../connexion.php?error=success");
        exit();
    }

