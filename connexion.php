<?php
session_start();

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'><link rel='stylesheet' href='css/formulaires.css'>");
define("TITLE", "Connexion - ");

require_once("inc/views/head.inc.php");
?>

<form action="inc/connexion.inc.php" method="post" class="form-signin text-center">
  <a href="index.php"><img class="mb-1" src="img/cityQuest.svg" alt="" height="72"></a>
  <h1 class="h1 mb-3 display-6 text-secondary">Connexion</h1>
  <?php
  if ($_GET["error"] == "mauvaisID") {
    echo "
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Zut de flute !</strong> L'adresse mail ou le mot de passe de correspond pas.
        <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  } elseif ($_GET["error"] == "connexionRequise") {
    echo "
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Zut de flute !</strong> Vous devez d'abord vous connecter pour acceder à cette page.
        <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  } elseif ($_GET["error"] == "success") {
    echo "
      <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Let's goooo !</strong> Votre compte à bien été crée ! Allez checker vos mail pour conf
        <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  } elseif ($_GET["error"] == "compteNonValidee") {
    echo "
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Zut de flute !</strong> Vous devez d'abord valider votre compte via le mail que l'on vous a envoyé
        <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  } elseif ($_GET["error"] == "deconnexionReussi") {
    echo "
      <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Let's goooo !</strong> Vous vous êtes bien déconnecter... À bientôt !
        <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  }

  ?>
  <hr>

  <label for="email" class="sr-only"><b>Adresse Email</b></label>
  <input type="text" placeholder="Adresse Email" name="email" class="form-control top" required>

  <label for="psw" class="sr-only"><b>Mot de passe</b></label>
  <input type="password" placeholder="Mot de passe" name="mdp" class="form-control bottom" required>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Se souvenir de moi
    </label>
  </div>

  <button type="submit" class="btn btn-lg btn-danger btn-block rounded-pill w-100">Se connecter</button>
  <a href="inscription.php" class="text-danger"><small>Pas de compte? Inscrivez-vous ici.</small></a>
  <p class="my-5 text-center text-secondary"><small>© City<b class="text-danger">Quest</b> 2020 - Tous Droits Réservés</small></p>
</form>

<?php require_once("inc/views/foot.inc.php"); ?>
