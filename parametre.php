<?php
session_start();

if (!isset($_SESSION["email"])) {
  header('Location: connexion.php?error=connexionRequise');
  exit();
}

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", "Paramètre - ");
require_once("inc/views/head.inc.php");
require_once("inc/views/header.inc.php");
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Utilisateur.php');

$utilisateur = new Utilisateur();
$utilisateurs = $utilisateur->getRandomSuggestion();
?>

<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded border">
    <div class="d-flex justify-content-between">
      <img class="me-3" src="img/avatar/<?php echo $_SESSION["avatar"]; ?>" alt="" height="150" class="rounded-pill">
      <div class="lh-1">
        <h1 class="h6 mb-0 text-danger lh-1"><b><?php echo $_SESSION["prenom"] . " " . $_SESSION["nom"]; ?></b></h1>
        <small class="text-secondary"><?php echo $_SESSION["bio"]; ?></small>
        <button id="editer" class="btn btn-secondary ms-3" onclick="showForm()">Editer</button>
      </div>
    </div>
  </div>

  <form id="formParametre" action="inc/parametre.inc.php" method="POST" enctype="multipart/form-data">
    <script>
      $('#formParametre').hide();
    </script>
    <div class="p-3 my-3 rounded border">
      <div class="row">
        <div class="col-3 rounded d-flex align-items-center justify-content-center">
          <label for="fileToUpload">
            <img class="mx-auto my-4" src="img/avatar/<?php echo $_SESSION["avatar"]; ?>" alt="" height="45" style="cursor: pointer;">
            <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" style="display:none">
          </label>
        </div>
        <div class="col-9">
          <div class="row">
            <div class="col-6">
              <label class="fw-bold" for="prenom">Prénom</label>
              <input type="text" name="prenom" id="prenom" class="form-control rounded-pill border-danger" value='<?php echo $_SESSION["prenom"]; ?>'>
            </div>
            <div class="col-6"></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-3 rounded d-flex align-items-center justify-content-start">
        </div>
        <div class="col-9">
          <div class="row">
            <div class="col-6">
              <label class="fw-bold" for="nom">Nom</label>
              <input type="text" name="nom" id="nom" class="form-control rounded-pill border-danger" value='<?php echo $_SESSION["nom"]; ?>'>
            </div>
            <div class="col-6"></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-3 rounded d-flex align-items-center justify-content-start">
          <img class="" src="" alt="" height="45">
        </div>
        <div class="col-9">
          <div class="row">
            <div class="col-6">
              <label class="fw-bold" for="nom">Bio</label>
              <textarea class="form-control rounded border-danger" name="bio" id="" cols="30" rows="7"><?php echo $_SESSION["bio"]; ?></textarea>
              <div class="row">
                <div class="col-6">
                  <button type="button" class="btn btn-danger btn-block rounded-pill w-100 mt-3" value="Valider" onclick="hideForm()">Annuler</button>
                </div>
                <div class="col-6">
                  <button class="btn btn-danger btn-block rounded-pill w-100 mt-3" type="submit" value="Valider">Valider</button>
                </div>
              </div>
            </div>
            <div class="col-6"></div>
          </div>
        </div>

      </div>

    </div>

  </form>

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


  </div>
  <small class="d-block text-end mt-3">
    <a href="parametre.php" class="text-danger">Raffraichir les suggestions</a>
  </small>
  </div>
</main>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>


<script>
  function hideForm() {
    $('#formParametre').hide();
    $('#editer').text("Editer");
    $("#editer").attr("onclick", "showForm()");
  }

  function showForm() {
    $('#formParametre').show();
    $('#editer').text("Fermer");
    $("#editer").attr("onclick", "hideForm()");
  }
</script>