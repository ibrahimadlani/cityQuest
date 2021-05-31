<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Avis.php');


$avis = new Avis();

$text = $_POST['texte'];
$note = $_POST['note'];
$auteur = $_POST['auteur'];
$idPoint = $_POST['idPoint'];
$typePoint = $_POST['typePoint'];

$data = array("text"=>$text, "note"=>$note, "auteur"=>$auteur, "idPoint"=>$idPoint, "typePoint"=>$typePoint);

echo($avis->addAvis($data));

?>