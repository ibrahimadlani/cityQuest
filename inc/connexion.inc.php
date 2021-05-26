<?php
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Utilisateur.php');
$user = new Utilisateur();


// Si soit l'adresse ou le mdp n'est pas infromé, retour à la page de connexion
if (!(isset($_POST['email']) && isset($_POST['mdp']))) {
    header('Location: ../connexion.php');
    exit();
// Si la combinaison n'est pas reconnu
} elseif (!$user->checkCredential($_POST['email'], $_POST['mdp'])) {
    header('Location: ../connexion.php?error=mauvaisID');
    exit();
// Si la combinaison est reconnu mais que l'adresse mail n'est pas validé via le mail de comfirmation
} elseif (!$user->compteEstValide($_POST['email'])) {
    header('Location: ../connexion.php?error=compteNonValidee');
    exit();
// Si tout est bon
} else {
    // Recuperation des information de l'user et stockage dans des variables de sessions
    $users = $user->getUtilisateurbyEmail($_POST['email']);
    $_SESSION["id"] = $users[0]->id;
    $_SESSION["email"] = $users[0]->email;
    $_SESSION["nom"] = $users[0]->nom;
    $_SESSION["prenom"] = $users[0]->prenom;
    $_SESSION["motDePasse"] = $users[0]->mdp;
    $_SESSION["bio"] = $users[0]->bio;
    $_SESSION["groupe"] = $users[0]->groupe;
    $_SESSION["avatar"] = $users[0]->avatar;
    $_SESSION["dateCreation"] = $users[0]->dateCreation;

    // Redirection vers la page carte.php
    header("Location: ../carte.php?error=success");
    exit();
}
