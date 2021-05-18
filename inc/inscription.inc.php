<?php

require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/User.php');

$email = $_POST['email'];
$mdp = $_POST['mdp'];
$mdpconfirmation = $_POST['mdpconfirmation'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$user = new User();
$users = $user->getUsers();

    if (!(isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['mdpconfirmation']) && isset($_POST['nom']) &&  isset($_POST['prenom']))) {
        echo "oui";
        header('Location: ../inscription.php');
        exit();
    }elseif (!$mdp === $mdpconfirmation) {
        header('Location: ../inscription.php?error=mdpDifferents');
        exit();
    }elseif ($user->emailExist($email)) {
        header('Location: ../inscription.php?error=emailExistant');
        exit();
    }elseif (strlen($mdpconfirmation) < 6) {
        header("Location: ../inscription.php?error=fsdfsdfdsf");
        exit();
    }else {
        $user->addUser(array("mail" => $email,"motDePasse" => password_hash($mdp, PASSWORD_DEFAULT),"nom" => $nom,"prenom" => $prenom,"groupe" => 0));
        header("Location: ../inscription.php?error=SUCCES");
        exit();
    }
}
