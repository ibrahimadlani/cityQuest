<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Lieu.php');

$lieu = new Lieu();

$data = array(
    'nom' => $_POST['nom'],
    'description' => $_POST['desc'],
    'presentation' => $_POST['pres'], 
    'adresse' => $_POST['adresse'],
    'lat' => $_POST['lat'],
    'lng' => $_POST['lng'],
    'ville' => $_POST['ville'],
    'typeLieu' => $_POST['typeLieu'],
    'auteur' => $_POST['auteur']);

$lieu->addLieu($data);