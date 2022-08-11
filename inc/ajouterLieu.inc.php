<?php
error_reporting(E_ALL);
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Lieu.php');
$lieu = new Lieu();

$data = array(
    'nom' => $_POST['nom'],
    'description' => $_POST['description'],
    'presentation' => $_POST['presentation'],
    'adresse' => $_POST['adresse'],
    'lat' => $_POST['latitude'],
    'lng' => $_POST['longitude'],
    'ville' => $_POST['ville'],
    'typeLieu' => $_POST['typeLieu'],
    'auteur' => $_POST['auteur']
);

print_r($data);

$lieu->addLieu($data);
