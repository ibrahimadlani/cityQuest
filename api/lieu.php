<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Lieu.php');

$lieu = new Lieu();

// Si les parametres sont VILLE et TYPE
if (isset($_GET["ville"]) && isset($_GET["typeLieu"])) {
    $lieux = $lieu->getLieuxByVilleAndType($_GET["typeLieu"],$_GET["ville"]);
}

// Si le parametre est uniquement TYPE
elseif (!isset($_GET["ville"]) && isset($_GET["typeLieu"])) {
    $lieux = $lieu->getLieuxByType($_GET["typeLieu"]);
}

// Si le parametres est uniquement VILLE
elseif (isset($_GET["ville"]) && !isset($_GET["typeLieu"])) {
    $lieux = $lieu->getLieuxByVille($_GET["ville"]);
}

// Si il n'y a pas de paramètre
elseif (!isset($_GET["ville"]) && !isset($_GET["typeLieu"])) {
    $lieux = $lieu->getLieux();
}

// Retourner le string json stocké dans $lieu
echo json_encode($lieux);
