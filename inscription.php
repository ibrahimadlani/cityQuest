<?php require_once("inc/views/head.inc.php"); ?>
<form action="inc/inscription.inc.php" method="post">

    <label for="email"><b>Adresse Email</b></label>
    <input type="text" placeholder="Adresse Email" name="email" required>

    <label for="psw"><b>Mot de passe</b></label>
    <input type="password" placeholder="Mot de passe" name="mdp" required>

    <label for="psw-repeat"><b>Confirmer le mot de passe</b></label>
    <input type="password" placeholder="Confirmer le mot de passe" name="mdpconfirmation" required>

    <label for="psw-repeat"><b>Nom</b></label>
    <input type="text" placeholder="Nom" name="nom" required>

    <label for="psw-repeat"><b>Prénom</b></label>
    <input type="text" placeholder="Prénom" name="prenom" required>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
      <button type="submit">Sign Up</button>
  </div>
</form>
<?php require_once("inc/views/foot.inc.php"); ?>