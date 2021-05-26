<?php 
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/TypeLieu.php');
$typelieu = new TypeLieu();


//Renvoie de la table TypeLieu en json
echo json_encode($typelieu->getTypesLieu());