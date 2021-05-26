<?php
session_start();

// Destruction de toute les variables de session
session_destroy();

// Redirection vers la page connexion avec un message de succes de deconnexion
header("Location: ../connexion.php?error=deconnexionReussi");
exit;
