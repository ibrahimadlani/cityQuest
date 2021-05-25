<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../config/db.php');
require_once('../lib/pdo_db.php');
require_once('../models/Utilisateur.php');

$id = $_SESSION['id'];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$bio = $_POST["bio"];
var_dump($_FILES["fileToUpload"]["name"]);
if(strlen($_FILES["fileToUpload"]["name"]) > 0){
    $target_dir = "/Applications/MAMP/htdocs/cityQuest/img/avatar/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $file = basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
    } else {
    echo "File is not an image.";
    $uploadOk = 0;
    }
    
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
}else{
    $file = $_SESSION['avatar'];
}



$user = new Utilisateur();

if($user->modifierInfos($id, $nom, $prenom, $bio, $file)){
    $_SESSION["nom"] = $nom;
    $_SESSION["prenom"] = $prenom;
    $_SESSION["bio"] = $bio;
    $_SESSION["avatar"] = $file;
    header("location: http://localhost:8888/cityQuest/parametre.php?error=success");
   exit();
}else{
    header("location: http://localhost:8888/cityQuest/parametre.php?error=fail");
    exit();
};



