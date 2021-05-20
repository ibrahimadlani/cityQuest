<?php 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Lieu.php');
$lieu = new Lieu();

if (isset($_GET["ville"]) && isset($_GET["typeLieu"])) {
    $lieux = $lieu->getLieuxByVilleAndType($_GET["typeLieu"],$_GET["ville"]);
}elseif (!isset($_GET["ville"]) && isset($_GET["typeLieu"])) {
    $lieux = $lieu->getLieuxByType($_GET["typeLieu"]);
}elseif (!isset($_GET["ville"]) && !isset($_GET["typeLieu"])) {
    $lieux = $lieu->getLieux();
}elseif (isset($_GET["ville"]) && !isset($_GET["typeLieu"])) {
    $lieux = $lieu->getLieuxByVille($_GET["ville"]);
}
echo json_encode($lieux);

