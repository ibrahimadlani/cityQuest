<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Utilisateur.php');

$email = $_POST['email'];
$mdp = $_POST['mdp'];

$user = new Utilisateur();


$user->checkCredential($email, $mdp);
    if (!(isset($_POST['email']) && isset($_POST['mdp']))) {
        header('Location: ../connexion.php');
        exit();
    }elseif (!$user->checkCredential($email, $mdp)) {
        header('Location: ../connexion.php?error=mauvaisID');
        exit();
    }elseif (!$user->compteEstValide($email)) {
        header('Location: ../connexion.php?error=compteNonValidee');
        exit();
    }else {
        $users = $user->getUtilisateurbyEmail($email);
        $_SESSION["id"] = $users[0]->id;
        $_SESSION["email"] = $users[0]->email;
        $_SESSION["nom"] = $users[0]->nom;
        $_SESSION["prenom"] = $users[0]->prenom;
        $_SESSION["motDePasse"] = $users[0]->mdp;
        $_SESSION["bio"] = $users[0]->bio;
        $_SESSION["groupe"] = $users[0]->groupe;
        $_SESSION["avatar"] = $users[0]->avatar;
        header("Location: ../carte.php?error=success");
        exit();
    }

