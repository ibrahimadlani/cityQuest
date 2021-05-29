<?php
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Ville.php');
$ville = new Ville();

$ville->addVille(array(
    'nom' => $_POST['ville'],
    'latitude' => $_POST['lat'],
    'longitude' => $_POST['lng']
));
