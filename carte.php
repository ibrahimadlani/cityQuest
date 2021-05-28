<?php
session_start();

if (!isset($_SESSION["email"])) {header('Location: connexion.php?error=connexionRequise');exit();}

require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Ville.php');
require_once('models/TypeLieu.php');

$ville = new Ville();
$villes = $ville->getVilles();
$typelieu = new TypeLieu();
$typeslieu = $typelieu->getTypesLieu();

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", "Carte - ");

require_once("inc/views/head.inc.php");
require_once("inc/views/header.inc.php");
?>

<div id="map"></div>
<div class="container my-5">
    <div class="row">
        <form class="col-12 col-lg-6">
            <h3 class="display-6"><i class="fas fa-search-location text-danger"></i> Rechercher</h3>
            <hr>
            <div class="row">
                <div class="col-6">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example" id="ville" onchange="initMap();">
                        <option selected value="0">France</option>
                        <?php foreach ($villes as $v) {
                            echo "<option value='" . $v->id . "'>" . $v->ville . "</option>";
                        } ?>
                    </select>
                </div>
                <div class="col-6">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example" id="type" onchange="initMap();">
                        <option selected value="0">Tout type</option>
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
                    <input class="rounded-end form-control border-danger rounded-pill" type="text" placeholder="Trouver une adresse" id="rechercheGoogleAPI" />
                </div>
                <div class="row">
                    <button type="button" class="rounded-start form-control border-danger btn-danger rounded-pill" onclick="recupererAdresse();" data-bs-toggle="collapse" data-bs-target="#modalAjouter"><i class="fas fa-search"></i></button>
                </div>
            </div>

            <div class="modal fade collapse multi-collapse" id="modalAjouter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel"><i class="fas fa-map-pin text-danger"></i> Ajout d'un point sur la carte</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control border-danger  rounded-5" type="text" placeholder="Titre" id="nom" />
                                </div>
                                <div class="col-6">
                                    <input class="form-control border-danger  rounded-5" type="text" placeholder="Courte description" id="desc" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <textarea class="form-control border-danger rounded-5" rows="3" placeholder="Présentation du point" id="pres"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <select class="form-select border-danger rounded-5" id="typeLieu">
                                        <option selected value="0">Type de lieu</option>
                                        <option value='" . $tl["id"] . "'>test</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="form-select border-danger rounded-5" id="ville2">
                                        <option selected value="0">Ville</option>
                                        <?php foreach ($_POST["ville"] as $v) {
                                            echo "<option value='" . $v["id"] . "'>" . $v["ville"] . "</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <hr>

                            <div class="btn-group d-flex" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                                <label class="btn btn-outline-danger col" for="btnradio1">Lieux<br><i class="far fa-building h1"></i></label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-danger col" for="btnradio2">Event<br><i class="far fa-calendar-check h1"></i></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger rounded-pill" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-danger rounded-pill">Ajouter le point</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="resultats"></div>
        </form>
    </div>

    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
    <div class="row">
        <form class="col-12 mt-5">
            <div id="resultatRecherche"></div>
        </form>
    </div>

</div>

<?php require_once("inc/footer.inc.php"); ?>
<?php require_once("inc/foot.inc.php"); ?>
