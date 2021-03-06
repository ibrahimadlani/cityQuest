<?php
session_start();

if (!isset($_SESSION["email"])) {
    header('Location: connexion.php?error=connexionRequise');
    exit();
}

require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Ville.php');
require_once('models/TypeLieu.php');
require_once('models/Avis.php');
require_once('models/Lieu.php');

$ville = new Ville();
$villes = $ville->getVilles();
$typelieu = new TypeLieu();
$typeslieu = $typelieu->getTypesLieu();
$avis = new Avis();
$lieu = new Lieu();
$lieux = $lieu->getLieux();

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", "Carte - ");
require_once("inc/views/head.inc.php");
require_once("inc/views/header.inc.php");

?>

<div id="map"></div>

<span id="carouselPromotions"></span>

<div class="container my-5">
    <div class="row">
        <form class="col-12 col-lg-6">
            <h3 class="display-6"><i class="fas fa-search-location text-danger"></i> Rechercher</h3>
            <hr>
            <div class="row">
                <div class="col-6">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example"
                            id="ville" onchange="initMap()">
                        <option selected value="0">Toutes les villes</option>
                        <?php foreach ($villes as $v) {
                            echo "<option value='" . $v->id . "'>" . $v->ville . "</option>";
                        } ?>
                    </select>
                </div>
                <div class="col-6">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example" id="typeLieu"
                            onchange="initMap()">
                        <option selected value="0">Tous les types</option>
                        <?php foreach ($typeslieu as $tl) {
                            echo "<option value='" . $tl->id . "'>" . $tl->type . "</option>";
                        } ?>
                    </select>
                </div>
            </div>
        </form>
        <form class="col-lg-6 col-12 mt-lg-0 mt-3">
            <h3 class="display-6"><i class="fas fa-map-pin text-danger"></i> Ajouter</h3>
            <hr>
            <div class="d-flex">
                <div class="flex-grow-1">
                    <input class="rounded-end form-control border-danger rounded-pill" type="text"
                           placeholder="Trouver une adresse" id="rechercheGoogleAPI"/>
                </div>
                <div class="">
                    <button type="button" class="rounded-start form-control border-danger btn-danger rounded-pill"
                            data-bs-toggle="collapse" data-bs-target="#fenetreAjouter" onclick="recupererAdresse()"><i
                                class="fas fa-search"></i></button>
                </div>
            </div>

            <span id="fenetreAjouter" class="collapse multi-collapse"></span>
        </form>
    </div>
    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i
                class="fas fa-chevron-up"></i></a>
    <div class="row">
        <form class="col-12 mt-5">
            <h3 class="display-6"><i class="fas fa-map-marked-alt text-danger"></i> Resultat</h3>
            <hr>

            <span id="resultatsEvenements"></span>

            <span id="resultatsLieux"></span>

        </form>
    </div>
</div>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>
