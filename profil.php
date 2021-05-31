<?php
session_start();

if (!isset($_SESSION["email"])) {
  header('Location: connexion.php?error=connexionRequise');
  exit();
}

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", "Profile - ");
require_once("inc/views/head.inc.php");
require_once("inc/views/header.inc.php");

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
    </div>
  </div>

  <div class="my-3 p-3 bg-body rounded border">
    <h6 class="border-bottom pb-2 mb-0">Dernieres activités</h6>
    <div class="d-flex text-muted pt-3 border-bottom">
      <img class="me-3" src="img/no-racism.svg" alt="" height="32">
      <p class="pb-3 mb-0 small lh-sm">
        <strong class="d-block text-gray-dark">Vous avez ajouté un lieu</strong>
        Le <?php echo date("d/m, ") . $_SESSION["prenom"]; ?> a ajouté un lieu dans la ville : Sedan</strong>
      </p>
    </div>
    <div class="d-flex text-muted pt-3 border-bottom">
      <img class="me-3" src="img/no-racism.svg" alt="" height="32">
      <p class="pb-3 mb-0 small lh-sm">
        <strong class="d-block text-gray-dark">Vous avez ajouté un photo</strong>
        Le <?php echo date("d/m, ") . $_SESSION["prenom"]; ?> a ajouté un photo dans un lieu : Iut Maubeuge</strong>
      </p>
    </div>
    <div class="d-flex text-muted pt-3 border-bottom">
      <img class="me-3" src="img/no-racism.svg" alt="" height="32">
      <p class="pb-3 mb-0 small lh-sm">
        <strong class="d-block text-gray-dark">Vous avez ajouté un avis</strong>
        Le <?php echo date("d/m, ") . $_SESSION["prenom"]; ?> a ajouté un avis dans un lieu : Iut Maubeuge</strong>
      </p>
    </div>
    <small class="d-block text-end mt-3">
      <a href="#" class="text-danger">Toutes les activités</a>
    </small>
  </div>

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
</main>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>