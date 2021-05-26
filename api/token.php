<?php 
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Utilisateur.php');
$utilisateur = new Utilisateur();

// Si il y a un token en paramètre token
if (isset($_GET["token"])) {
    // Si le token n'est pas reconnu
    if ($utilisateur->verifierToken($_GET["token"])) {
        // Revoie vers la page de connexion avec un meessage d'erreur
        header("Location: ../connexion.php?error=tokenIntrouvable");
        exit();
    // Si le token est reconnu
    }else{
        // Recuperation des information de l'user et stockage dans des variables de sessions
        $users = $user->getUtilisateurbyEmail($_SESSION["email"]);
        $_SESSION["id"] = $users[0]->id;
        $_SESSION["email"] = $users[0]->email;
        $_SESSION["nom"] = $users[0]->nom;
        $_SESSION["prenom"] = $users[0]->prenom;
        $_SESSION["motDePasse"] = $users[0]->mdp;
        $_SESSION["bio"] = $users[0]->bio;
        $_SESSION["groupe"] = $users[0]->groupe;
        $_SESSION["avatar"] = $users[0]->avatar;
        $_SESSION["dateCreation"] = $users[0]->dateCreation;

        // Revoie vers la page de carte avec un message de success
        header("Location: ../carte.php?error=emailValidee");
        exit();
    }
// Si il y n'y a pas le paramètre token
}else{
    header("Location: ../connexion.php?error=noToken");
    exit();
}
