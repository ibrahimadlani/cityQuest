<?php 
define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
require_once("inc/views/head.inc.php");
?>
<?php require_once("inc/views/headerConnecte.inc.php");?>
<?php if (!isset($_SESSION["email"])) {
    header("Location: index.php");
    exit;
   
}
?>

<div id="map"></div>
<input type="text" id="place">
<button onclick="initMap(document.getElementById('place').value);">send</button>
<p id="coord"></p>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>