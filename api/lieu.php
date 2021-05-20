<?php 
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Lieu.php');

$lieu = new Lieu();

// Si les parametres sont VILLE et TYPE
if (isset($_GET["ville"]) && isset($_GET["typeLieu"])) { $lieux = $lieu->getLieuxByVilleAndType($_GET["typeLieu"],$_GET["ville"]); }

// Si le parametres est TYPE
elseif (!isset($_GET["ville"]) && isset($_GET["typeLieu"])) { $lieux = $lieu->getLieuxByType($_GET["typeLieu"]); }

// Si il n'y a pas de paramètre
elseif (!isset($_GET["ville"]) && !isset($_GET["typeLieu"])) { $lieux = $lieu->getLieux(); }

// Si le parametres est VILLE
elseif (isset($_GET["ville"]) && !isset($_GET["typeLieu"])) { $lieux = $lieu->getLieuxByVille($_GET["ville"]); }

// Retourner le string json stocker dans $lieu
echo json_encode($lieux);

