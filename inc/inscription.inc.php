<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Utilisateur.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

$email = $_POST['email'];
$mdp = $_POST['mdp'];
$mdpconfirmation = $_POST['mdpconfirmation'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
try { $token = bin2hex(random_bytes(16)); }
catch (\Exception $e) {}

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
        
        $body = file_get_contents('../mails/email.html');

        $body = str_replace('$nom', $nom, $body);
        $body = str_replace('$prenom', $prenom, $body);
        $body = str_replace('$token', $token, $body);




        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->Username = 'cityquest.contact@gmail.com';
        $mail->Password = 'CityQuestIUTMAUBEUGE59%';
        $mail->setFrom('cityquest.contact@gmail.com', 'Ibrahim de CityQuest');
        $mail->addAddress($email, $prenom." ".$nom );

        $mail->isHTML(true);
        $mail->Priority = 1;
        $mail->AddCustomHeader("X-MSMail-Priority: High");
        $mail->AddCustomHeader("Importance: High");
        $mail->Subject = 'CityQuest - Activation de compte';
        //$mail->AddEmbeddedImage('../img/cQ.svg', 'logoPetit');
        //$mail->AddEmbeddedImage('img/2u_cs_mini.jpg', 'logo_2u');
        //$mail->AddEmbeddedImage('img/2u_cs_mini.jpg', 'logo_2u');
        //$mail->AddEmbeddedImage('img/2u_cs_mini.jpg', 'logo_2u');
        //$mail->AddEmbeddedImage('img/2u_cs_mini.jpg', 'logo_2u');
        //$mail->AddEmbeddedImage('img/2u_cs_mini.jpg', 'logo_2u');
        //$mail->body = " ";
        $mail->MsgHTML($body);
        $mail->IsHTML(true);
        $mail->CharSet="utf-8";
        $mail->AltBody = "Vous avez crée votre compte CityQuest et c'est le moment de le valider en cliquant sur ce lien : http://localhost:8888/cityQuest/api/token.php?token=".$token;
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            
        } else {
            $rwer = $user->addUtilisateur(array("email" => $email,"mdp" => password_hash($mdp, PASSWORD_DEFAULT),"nom" => $nom,"prenom" => $prenom,"groupe" => 1,"avatar" => "default.svg","bio" => "Je suis nouveau sur CityQuest !","token"=>$token));
            header("Location: ../connexion.php?error=success");
            exit();
            
            
        }
        
    }
