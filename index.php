<?php require_once("inc/views/head.inc.php"); 
if (isset($_SESSION["email"])) {
    echo "<h1>Vous etes connecté,". $_SESSION["email"]. "</h1><a href='inc/deconnexion.inc.php'>deconnexion</a></h1><a href='carte.php'>carte</a>";
    
}else {
    echo "<h1>Bienvenue</h1><a href='connexion.php'>connexion</a>
    <a href='inscription.php'>inscription</a>";
}
?>


<?php require_once("inc/views/foot.inc.php"); ?>