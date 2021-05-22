<?php 
session_start();

if (!isset($_SESSION["email"])) { header('Location: connexion.php?error=connexionRequise');exit(); }

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
require_once("inc/views/headerConnecte.inc.php");

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
                    <?php foreach ($villes as $v) {echo "<option value='" . $v->id . "'>" . $v->ville . "</option>";}?>
                    </select>
                </div>
                <div class="col-6">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example" id="type" onchange="initMap();">
                    <option selected value="0">Tout type</option>
                    <?php foreach ($typeslieu as $tl) {echo "<option value='" . $tl->id . "'>" . $tl->type . "</option>";}?>
                    </select>
                </div>

            </div>
        </form>
        <form class="col-6">
            <h3 class="display-6"><i class="fas fa-map-pin text-danger"></i> Ajouter</h3>
            <hr>
            <div class="row">
                <div class="col-8">
                    <input  class="form-control border-danger rounded-pill" type="text" placeholder="Lieu" /> 
                </div>
                <div class="col-4">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example">
                    <option selected>Type</option>
                        <option value="1">Lieu</option>
                        <option value="2">Evenement</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-8">
                    <input type="text" class="form-control border-danger rounded-pill" placeholder="Lieu">
                </div>
                <div class="col-4">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example">
                    <option selected>Type</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
    
    <div class="row">
        <form class="col-12 mt-5">
            <div id="mypar"></div>
        </form>
        
    </div>
</div>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>

<!--

    INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,1,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,1,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,2,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,2,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,2,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,3,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,3,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,3,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,4,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,4,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,4,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,5,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,5,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,5,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,5,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,6,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,6,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,2,6,1);

INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,1,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,1,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,2,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,2,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,2,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,3,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,3,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,3,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,4,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,4,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,4,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,5,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,5,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,5,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,5,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,6,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,6,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,3,6,1);

INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,1,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,1,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,2,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,2,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,2,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,3,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,3,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,3,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,4,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,4,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,4,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,5,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,5,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,5,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,5,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,6,1);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,6,2);
INSERT INTO `Lieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES ("","","",,4,6,1);

-->