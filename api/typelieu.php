<?php 
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/TypeLieu.php');
$typelieu = new TypeLieu();
$typeslieu = $typelieu->getTypesLieu();
echo json_encode($typeslieu);