<?php
session_start();

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'><link rel='stylesheet' href='css/formulaires.css'>");
define("TITLE", "Inscription - ");

require_once("inc/views/head.inc.php");
?>
<form action="inc/inscription.inc.php" method="post" class="form-signin text-center">
  <a href="index.php"><img class="mb-1" src="img/cityQuest.svg" alt="" height="72"></a>
  <h1 class="h3 mb-3 display-6 text-secondary">Inscription</h1>
  <?php
  if ($_GET["error"] == "mdpDifferents") {
    echo "
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>ERREUR :</strong> Les mots de passes ne correspondent pas.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  } elseif ($_GET["error"] == "emailExistant") {
    echo "
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>ERREUR :</strong> Cette adresse mail semble déja être utilisée.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  } elseif ($_GET["error"] == "tropCourt") {
    echo "
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>ERREUR :</strong> Le mot de passe est trop court (5 car. min.).
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  } elseif ($_GET["error"] == "mdpSansChiffre") {
    echo "
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>ERREUR :</strong> Le mot de passe doit contenir au moins un chiffre.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  } elseif ($_GET["error"] == "mdpSansLettre") {
    echo "
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>ERREUR :</strong> Le mot de passe doit contenir au moins une lettre.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  }
  ?>
  <hr>

  <label for="email" class="sr-only"><b>Adresse Email</b></label>
  <input type="email" placeholder="Adresse Email" name="email" class="form-control top" required>

  <label for="psw" class="sr-only"><b>Mot de passe</b></label>
  <input type="password" placeholder="Mot de passe" name="mdp" class="form-control center" required>

  <label for="psw-repeat" class="sr-only"><b>Confirmer le mot de passe</b></label>
  <input type="password" placeholder="Confirmer le mot de passe" name="mdpconfirmation" class="form-control center" required>

  <label for="psw-repeat" class="sr-only"><b>Nom</b></label>
  <input type="text" placeholder="Nom" name="nom" class="form-control center" required>

  <label for="psw-repeat" class="sr-only"><b>Prénom</b></label>
  <input type="text" placeholder="Prénom" name="prenom" class="form-control bottom" required>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Se souvenir de moi
    </label>
  </div>
  <button class="btn btn-lg btn-danger btn-block rounded-pill w-100" name="submit" type="submit">S'inscrire</button>
  <a href="connexion.php" class="text-danger"><small>Déjà un compte ? Connectez-vous ici.</small></a>
  <p class="my-5 text-center text-secondary"><small>© City<b class="text-danger">Quest</b> 2020 - Tous Droits Réservés</small></p>
</form>


<?php require_once("inc/views/foot.inc.php"); ?>
