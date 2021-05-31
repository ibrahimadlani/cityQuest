<?php
session_start();

if (!isset($_SESSION["email"])) {header('Location: connexion.php?error=connexionRequise');exit();}

require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Utilisateur.php');

$utilisateur = new Utilisateur();
$utilisateurs = $utilisateur->getRandomProfiles($_SESSION["id"]);

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", "Paramètre - ");

require_once("inc/views/head.inc.php");
require_once("inc/views/header.inc.php");
?>

<main class="container">
<<<<<<< HEAD
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
=======
    <div class="row border my-3 rounded justify-content-center">
        <div class="col-12 pt-5 justify-content-center">
            <img class="rounded-pill mx-auto d-block" height="200" width="200" src="img/avatar/<?php echo $_SESSION["avatar"]; ?>" alt="">
            <h1 class="display-4 fw-bold text-center mb-0"><?php echo ucfirst($_SESSION["prenom"]) . " " . strtoupper($_SESSION["nom"]); ?></h1>
            <small class="text-center mx-auto d-block text-danger"><?php echo $_SESSION["email"]; ?> - Inscrit depuis le <?php echo strftime("%d/%m/%Y", strtotime($_SESSION["dateCreation"])); ?></small>
            <p class="lead col-12 col-md-8 col-lg-6 text-center mx-auto text-secondary"><?php echo $_SESSION["bio"]; ?></p>
>>>>>>> 744a2343dc3aeb3877579881408b373f06253a9e
        </div>
        <div class="col-12 bg-white py-3 ">
            <button id="editer" class="btn btn-danger rounded-pill mx-auto d-block px-4" data-bs-toggle="collapse" data-bs-target="#forms"">
                <i class="fas fa-edit" aria-hidden="true"></i> Editer mon profil
            </button>
        </div>

        <div class="row collapse multi-collapse" id="forms">
            <div class="col-12 col-md-8 col-lg-6 mx-auto my-3 pt-3 border-top">

                <form action="inc/parametre.inc.php" method="POST" enctype="multipart/form-data">
                    <h3>Edition du profil</h3>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-6">
                            <label class="lead" for="">Prénom</label>
                            <input id="prenom" class="form-control border-danger rounded" type="text" placeholder="John" value="<?php echo $_SESSION["prenom"]; ?>">
                        </div>
                        <div class="col-6">
                            <label class="lead" for="">Nom</label>
                            <input id="nom" class="form-control border-danger rounded" type="text" placeholder="Smith" value="<?php echo $_SESSION["nom"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-8">
                            <label class="lead" for="">Adresse mail</label>
                            <input id="email" class="form-control border-danger rounded" type="text" placeholder="john.smith@email.com" value="<?php echo $_SESSION["email"]; ?>">
                        </div>
                        <div class="col-4">
                            <label class="lead" for="">Photo de profil</label>
                            <input id="image" class="form-control border-danger" type="file" id="formFile">
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label class="lead" for="">Bio</label>
                            <textarea id="bio" class="form-control border-danger rounded" rows="3" placeholder="Je suis nouveau sur CityQuest !"><?php echo $_SESSION["bio"]; ?></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <button class="btn btn-danger rounded-pill mx-auto d-block px-4" data-bs-toggle="collapse" data-bs-target="#forms" type="submit"><i class="fas fa-check" aria-hidden="true"></i> Sauvegarder mon profil</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-danger rounded-pill mx-auto d-block px-4" data-bs-toggle="collapse" data-bs-target="#forms"><i class="fas fa-times" aria-hidden="true"></i> Annuler les modifications</button>
                        </div>
                    </div>
                </form>

                <form>
                    <h3 class="mt-5">Changement du mot de passe</h3>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <label class="lead" for="">Nouveau mot de passe</label>
                            <input class="form-control border-danger rounded" type="password" placeholder="">
                        </div>
                        <div class="col-6">
                            <label class="lead" for="">Confirmation du mot de passe</label>
                            <input class="form-control border-danger rounded" type="password" placeholder="">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-danger rounded-pill mx-auto d-block px-4" data-bs-toggle="collapse" data-bs-target="#forms"><i class="fas fa-check" aria-hidden="true"></i> Changer mon mot de passe</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

<<<<<<< HEAD
      <div class="row">
        <div class="col-3 rounded d-flex align-items-center justify-content-start">
          <img class="" src="" alt="" height="45">
=======
    </div>

    <div class="my-3 p-3 bg-body rounded border row">
        <h6 class="pb-2 mb-0">Dernieres activités</h6>
        <div class="d-flex text-muted pt-3 border-top">
            <img class="me-3 rounded" src="img/avatar/C84C9725-E812-4F13-BFAD-052CBFBE71E4.jpeg" alt="" height="32">
            <p class="pb-3 mb-0 small lh-sm">
                <strong class="d-block text-gray-dark">Vous avez ajouté un lieu</strong>
                Le 10 Mai, Ibrahim a ajouté un lieu dans la ville : Sedan</strong>
            </p>
>>>>>>> 744a2343dc3aeb3877579881408b373f06253a9e
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
=======
    <div class="my-3 p-3 bg-body rounded border row">
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
                <img class="me-3 rounded" src="img/avatar/' . $avatar . '" alt="" height="32">
                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                    <div class="d-flex justify-content-between">
                        <strong class="text-gray-dark">' . $prenom . ' ' . $nom . '</strong>
                        <a href="profil.php?id=' . $id . '" class="text-danger">Voir le profil</a>
                    </div>
                    <span class="d-block">' . $bio . '</span>
                </div>
>>>>>>> 744a2343dc3aeb3877579881408b373f06253a9e
            </div>
            ';
        }
        ?>

<<<<<<< HEAD
  </div>
  <small class="d-block text-end mt-3">
    <a href="parametre.php" class="text-danger">Raffraichir les suggestions</a>
  </small>
  </div>
=======
        <!--<small class="d-block text-end mt-3">
            <a href="#" class="text-danger">Raffraichir les suggestions</a>
        </small>-->
    </div>
>>>>>>> 744a2343dc3aeb3877579881408b373f06253a9e
</main>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>
