<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/User.php');

$email = $_POST['email'];
$mdp = $_POST['mdp'];

$user = new User();


$user->checkCredential($email, $mdp);
    if (!(isset($_POST['email']) && isset($_POST['mdp']))) {
        header('Location: ../connexion.php');
        exit();
    }elseif (!$user->checkCredential($email, $mdp)) {
        header('Location: ../connexion.php?error=mauvaisID');
        exit();
    }else {
        $users = $user->getUsersbyEmail($email);
        $_SESSION["email"] = $users[0]->mail;
        $_SESSION["nom"] = $users[0]->nom;
        $_SESSION["prenom"] = $users[0]->prenom;
        $_SESSION["motDePasse"] = $users[0]->motDePasse;
        header("Location: ../carte.php?error=success");
        exit();
    }

