<?php
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Ville.php');
$ville = new Ville();

$result = $ville->getVillesUsingNom($_POST['nom']);
if (count($result) == 0) { //Si la ville n'existe pas, on la créé
    $result = $ville->addVille(array(
        'ville' => $_POST['nom'],
        'lat' => $_POST['latitude'],
        'lng' => $_POST['longitude']
    ));
}
else {
    $result = $result[0]->id;
}

return $result;


