<?php
session_start();

if (!isset($_SESSION["email"])) { header('Location: connexion.php?error=connexionRequise'); exit(); }

require_once("inc/views/head.inc.php");
require_once("inc/views/header.inc.php");

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", $_SESSION["prenom"] . " " . $_SESSION["nom"] . " - ");

?>

<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded border">
    <img class="me-3" src="img/avatar/<?php echo $_SESSION["avatar"]; ?>" alt="" height="45">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-danger lh-1"><b><?php echo $_SESSION["prenom"] . " " . $_SESSION["nom"]; ?></b></h1>
      <small class="text-secondary"><?php echo $_SESSION["bio"]; ?></small>
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

  <div class="my-3 p-3 bg-body rounded border">
    <h6 class="border-bottom pb-2 mb-0">Suggestions de profils</h6>
    <div class="d-flex text-muted pt-3">
      <img class="me-3" src="img/zoid.svg" alt="" height="32">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Alaaedin ALMAJO</strong>
          <a href="#" class="text-danger">Voir le profil</a>
        </div>
        <span class="d-block">@imigreySangPapiey</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <img class="me-3" src="img/protection.svg" alt="" height="32">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Alcide FAUCHERON</strong>
          <a href="#" class="text-danger">Voir le profil</a>
        </div>
        <span class="d-block">@bonwafwaf08150</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <img class="me-3" src="img/reliability.svg" alt="" height="32">
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
</main>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>
