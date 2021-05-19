<?php require_once("inc/views/head.inc.php"); ?>
<form action="inc/connexion.inc.php" method="post">

    <label for="email"><b>Adresse Email</b></label>
    <input type="text" placeholder="Adresse Email" name="email" required>

    <label for="psw"><b>Mot de passe</b></label>
    <input type="password" placeholder="Mot de passe" name="mdp" required>

      <button type="submit">Sign Up</button>
  </div>
</form>
<?php require_once("inc/views/foot.inc.php"); ?>