<?php 
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Ville.php');
$ville = new Ville();

//Renvoie de la table Ville en json
echo json_encode($ville->getVilles());