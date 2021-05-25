<?php 
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Utilisateur.php');

$utilisateur = new Utilisateur();

$utilisateurs = $utilisateur->getRandomSuggestion();

echo json_encode($utilisateurs);

?>