<?php
session_start();
require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Lieu.php');
$lieu = new Lieu();



$lieu->setProprietaire($_SESSION['id'], $_POST['idLieu']);
