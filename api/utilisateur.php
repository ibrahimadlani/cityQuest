<?php 
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Utilisateur.php');

$utilisateur = new Utilisateur();


$utilisateurs = $utilisateur->getUtilisateurs();

echo json_encode($utilisateurs);