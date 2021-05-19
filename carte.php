<?php 
session_start();

if (!isset($_SESSION["email"])) { header('Location: connexion.php?error=connexionRequise');exit(); }

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", "Carte - ");
require_once("inc/views/head.inc.php");
require_once("inc/views/headerConnecte.inc.php");


?>

<div id="map"></div>
<div class="container my-5">
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod consectetur veniam neque commodi, nulla quo dolorem voluptatum sapiente repellat harum, at quasi voluptates error vel ipsum, maiores quisquam sit alias?

    </p>
</div>
<input type="text" id="place">
<button onclick="initMap(document.getElementById('place').value);">send</button>
<p id="coord"></p>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>