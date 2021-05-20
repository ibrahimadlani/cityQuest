<?php 
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Ville.php');
$ville = new Ville();
$villes = $ville->getVilles();
echo json_encode($villes);