<?php
session_start();

if (!isset($_SESSION["email"])) { header('Location: connexion.php?error=connexionRequise'); exit(); }

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", $_SESSION["prenom"] . " " . $_SESSION["nom"] . " - ");

require_once("inc/views/head.inc.php");
require_once("inc/views/header.inc.php");
<<<<<<< HEAD

require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Utilisateur.php');


if (isset($_GET["id"])) {
  $id = $_GET['id'];
  $utilisateur = new Utilisateur();
  $user = $utilisateur->getUtilisateurbyId($id)[0];
  $utilisateurs = $utilisateur->getRandomSuggestion();
} else {
  header("location: parametre.php");
  exit();
}



?>

<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded border">
    <img class="me-3" src="img/avatar/<?php echo $user->avatar; ?>" alt="" height="45">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-danger lh-1"><b><?php echo $user->prenom . " " . $user->nom; ?></b></h1>
      <small class="text-secondary"><?php echo $user->bio; ?></small>
=======
?>

<main class="container">
    <div class="row border my-3 rounded justify-content-center">
        <div class="col-12 pt-5 justify-content-center">
            <img class="rounded-pill mx-auto d-block" height="200" width="200" src="img/avatar/C84C9725-E812-4F13-BFAD-052CBFBE71E4.jpeg" alt="">
            <h1 class="display-4 fw-bold text-center mb-0"><?php echo $_SESSION["prenom"] . " " . $_SESSION["nom"]; ?></h1>
            <small class="text-center mx-auto d-block text-danger"><?php echo $_SESSION["email"]; ?> - Inscrit depuis le <?php echo strftime("%d/%m/%Y", strtotime($_SESSION["dateCreation"])); ?></small>
            <p class="lead col-12 col-md-8 col-lg-6 text-center mx-auto text-secondary">><?php echo $_SESSION["bio"]; ?></p>
        </div>
>>>>>>> 744a2343dc3aeb3877579881408b373f06253a9e
    </div>

    <div class="my-3 p-3 bg-body rounded border row">
        <h6 class="pb-2 mb-0">Dernieres activités</h6>
        <div class="d-flex text-muted pt-3 border-top">
            <img class="me-3 rounded" src="img/avatar/C84C9725-E812-4F13-BFAD-052CBFBE71E4.jpeg" alt="" height="32">
            <p class="pb-3 mb-0 small lh-sm">
                <strong class="d-block text-gray-dark">Vous avez ajouté un lieu</strong>
                Le 10 Mai, Ibrahim a ajouté un lieu dans la ville : Sedan</strong>
            </p>
        </div>
        <div class="d-flex text-muted pt-3 border-top">
            <img class="me-3 rounded" src="img/avatar/C84C9725-E812-4F13-BFAD-052CBFBE71E4.jpeg" alt="" height="32">
            <p class="pb-3 mb-0 small lh-sm">
                <strong class="d-block text-gray-dark">Vous avez ajouté un photo</strong>
                Le 10 Mai, Ibrahim a ajouté un photo dans un lieu : Iut Maubeuge</strong>
            </p>
        </div>
        <div class="d-flex text-muted pt-3 border-top">
            <img class="me-3 rounded" src="img/avatar/C84C9725-E812-4F13-BFAD-052CBFBE71E4.jpeg" alt="" height="32">
            <p class="pb-3 mb-0 small lh-sm">
                <strong class="d-block text-gray-dark">Vous avez ajouté un avis</strong>
                Le 10 Mai, Ibrahim a ajouté un avis dans un lieu : Iut Maubeuge</strong>
            </p>
        </div>

    </div>

<<<<<<< HEAD
  <div class="my-3 p-3 bg-body rounded border" id="suggestion">
    <h6 class="border-bottom pb-2 mb-0">Suggestions de profils</h6>
    <?php

    foreach ($utilisateurs as $key => $user) {
      $prenom = $user->prenom;
      $nom = $user->nom;
      $bio = $user->bio;
      $avatar = $user->avatar;
      $id = $user->id;

      echo '
          
          <div class="d-flex text-muted pt-3">
          <img class="me-3" src="img/avatar/' . $avatar . '" alt="" height="32">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
              <div class="d-flex justify-content-between">
                <strong class="text-gray-dark">' . $prenom . ' ' . $nom . '</strong>
                <a href="profil.php?id=' . $id . '" class="text-danger">Voire le profil</a>
              </div>
              <span class="d-block">' . $bio . '</span>
            </div>
          </div>

          ';
      }

    ?>

    <small class="d-block text-end mt-3">
      <a href="profil.php?id=<?php echo $id ?>" class="text-danger">Raffraichir les suggestions</a>
    </small>
  </div>
=======
    <div class="my-3 p-3 bg-body rounded border row">
        <h6 class="border-bottom pb-2 mb-0">Suggestions de profils</h6>
        <div class="d-flex text-muted pt-3">
            <img class="me-3 rounded" src="img/avatar/8BF161B6-A494-4F9A-B4FE-99D590B8ADF5_1_201_a.jpeg" alt="" height="32">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-gray-dark">Alaaedin ALMAJO</strong>
                    <a href="#" class="text-danger">Voir le profil</a>
                </div>
                <span class="d-block">@imigreySangPapiey</span>
            </div>
        </div>
        <div class="d-flex text-muted pt-3">
            <img class="me-3 rounded" src="img/avatar/8BF161B6-A494-4F9A-B4FE-99D590B8ADF5_1_201_a.jpeg" alt="" height="32">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-gray-dark">Alcide FAUCHERON</strong>
                    <a href="#" class="text-danger">Voir le profil</a>
                </div>
                <span class="d-block">@bonwafwaf08150</span>
            </div>
        </div>
        <div class="d-flex text-muted pt-3">
            <img class="me-3 rounded" src="img/avatar/8BF161B6-A494-4F9A-B4FE-99D590B8ADF5_1_201_a.jpeg" alt="" height="32">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-gray-dark">Clarence CLAUX</strong>
                    <a href="#" class="text-danger">Voir le profil</a>
                </div>
                <span class="d-block">@bigzgegenergy</span>
            </div>
        </div>
        <small class="d-block text-end mt-3">
            <a href="#" class="text-danger">Raffraichir les suggestions</a>
        </small>
    </div>
>>>>>>> 744a2343dc3aeb3877579881408b373f06253a9e
</main>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>
