<?php 
define("CONSTANT", "<link rel='stylesheet' href='css/master.css'><link rel='stylesheet' href='css/formulaires.css'>");
require_once("inc/views/head.inc.php");
?>

<form action="inc/connexion.inc.php" method="post" class="form-signin text-center">
  <img class="mb-1" src="img/cityQuest.svg" alt=""  height="72">
      <h1 class="h1 mb-3 display-6 text-secondary">Connexion</h1>
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
    <p class="my-5 text-center text-secondary"><small>© City<b class="text-danger">Quest</b> 2020 - Tous Droits Réservés</small>
  </div>
</form>

<?php require_once("inc/views/foot.inc.php"); ?>