<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Lieu.php');

$lieu = new Lieu();

$lieu->setProprietaire($_SESSION['id'], $_POST['idLieu']);
