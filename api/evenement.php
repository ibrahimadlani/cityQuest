<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Evenement.php');

$evenement = new Evenement();

// Si les parametres sont VILLE et TYPE
if (isset($_GET["ville"]) && isset($_GET["typeEvenement"])) {
    $evenements = $evenement->getEvenementsByVilleAndType($_GET["typeEvenement"],$_GET["ville"]);
}

// Si le parametre est uniquement TYPE
elseif (!isset($_GET["ville"]) && isset($_GET["typeEvenement"])) {
    $evenements = $evenement->getEvenementsByType($_GET["typeEvenement"]);
}

// Si le parametres est uniquement VILLE
elseif (isset($_GET["ville"]) && !isset($_GET["typeEvenement"])) {
    $evenements = $evenement->getEvenementsByVille($_GET["ville"]);
}

// Si il n'y a pas de paramètre
elseif (!isset($_GET["ville"]) && !isset($_GET["typeEvenement"])) {
    $evenements = $evenement->getEvenements();
}

// Retourner le string json stocké dans $evenement
echo json_encode($evenements);
