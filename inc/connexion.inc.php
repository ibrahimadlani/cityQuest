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
$users = $user->getUsers();
$user->checkCredential($email, $mdp);
    if (!(isset($_POST['email']) && isset($_POST['mdp']))) {
        header('Location: ../connexion.php');
        exit();
    }elseif (!$user->checkCredential($email, $mdp)) {
        header('Location: ../connexion.php?error=mauvaisID');
        exit();
    }else {
        $_SESSION["email"] = $email;
        header("Location: ../index.php?error=SUCCES");
        exit();
    }

