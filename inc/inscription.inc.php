<?php
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Utilisateur.php');
$user = new Utilisateur();



// Importation de phpMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

// Generation d'un token unique
$token = bin2hex(random_bytes(16));



// Si un des champs sont manquants
if (!(isset($_POST['email']) || !isset($_POST['mdp']) || !isset($_POST['mdpconfirmation']) || !isset($_POST['nom']) ||  !isset($_POST['prenom']))) {
    header('Location: ../inscription.php');
    exit();
// Si les mots de passes de correspondent pas
} elseif (!$_POST['mdp'] === $_POST['mdpconfirmation']) {
    header('Location: ../inscription.php?error=mdpDifferents');
    exit();
// Si le mail est déja utilisé
} elseif ($user->emailExist($_POST['email'])) {
    header('Location: ../inscription.php?error=emailExistant');
    exit();
// Si le mot de passe à moins de 6 caractères
} elseif (strlen($_POST['mdpconfirmation']) < 6) {
    header("Location: ../inscription.php?error=tropCourt");
    exit();
// Si il n'y a pas de chiffres
} elseif (!preg_match("#[0-9]+#", $_POST['mdp'])) {
    header('Location: ../inscription.php?error=mdpSansChiffre');
    exit();
// Si il n'y a pas de lettres
} elseif (!preg_match("#[a-zA-Z]+#", $_POST['mdp'])) {
    header('Location: ../inscription.php?error=mdpSansLettre');
    exit();
// Si tout va bien
} else {
    
    // Mise en place du mail
    $body = file_get_contents('../mails/email.html');
    $body = str_replace('$nom', $_POST['nom'] , $body);
    $body = str_replace('$prenom ', $_POST['prenom'] , $body);
    $body = str_replace('$token', $token, $body);
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPAuth = true;
    $mail->Username = 'hello.cityquest@gmail.com';
    $mail->Password = 'Fiona08200';
    $mail->setFrom('cityquest.contact@gmail.com', 'Equipe de CityQuest');
    $mail->addAddress($_POST['email'], $_POST['prenom']  . " " . $_POST['nom'] );
    $mail->isHTML(true);
    $mail->Priority = 1;
    $mail->AddCustomHeader("X-MSMail-Priority: High");
    $mail->AddCustomHeader("Importance: High");
    $mail->Subject = 'CityQuest - Activation de compte';
    $mail->MsgHTML($body);
    $mail->IsHTML(true);
    $mail->CharSet = "utf-8";
    $mail->AltBody = "Vous avez crée votre compte CityQuest et c'est le moment de le valider en cliquant sur ce lien : https://faucheron.fr/cityQuest/api/token.php?token=" . $token;

    // Si l'envoie du mail a marché
    if (!$mail->send()) {

        // Print un message d'erreur
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    // Si l'envoie du mail n'a pas marché
    } else {
        // Insertion du nouvel utilisateur dans la base de donnée
        $user->addUtilisateur(array("email" => $_POST['email'], "mdp" => password_hash($_POST['mdp'], PASSWORD_DEFAULT), "nom" => $_POST['nom'] , "prenom" => $_POST['prenom'] , "groupe" => 1, "avatar" => "default.svg", "bio" => "Je suis nouveau sur CityQuest !", "token" => $token));

        // Renvoie vers la page de connexion avec un message qui demande à l'utilisateur de confirmer son compte
        header("Location: ../connexion.php?error=success");
        exit();
    }
}
