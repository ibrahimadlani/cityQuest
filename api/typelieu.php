<?php 
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/TypeLieu.php');

$typelieu = new TypeLieu();

// Recuperation de tout les types de lieu en BDD
$typeslieu = $typelieu->getTypesLieu();

//Renvoie de la table TypeLieu en json
echo json_encode($typeslieu);