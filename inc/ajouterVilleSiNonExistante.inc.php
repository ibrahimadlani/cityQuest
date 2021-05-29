<?php
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Ville.php');
$ville = new Ville();

$result = $ville->getVillesUsingNom($_POST['nom'])['id'];

if ($result == -1) { //Si la ville n'existe pas, on la créé
    $result = $ville->addVille(array(
        'ville' => $_POST['nom'],
        'lat' => $_POST['latitude'],
        'lng' => $_POST['longitude']
    ));
}

echo $result;


