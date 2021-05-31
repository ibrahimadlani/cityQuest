<?php
session_start();

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", "");

require_once("inc/views/head.inc.php");
require_once("inc/views/header.inc.php");
?>

<div class="container">
    <div class="row align-items-center border-bottom">
        <div class="col-lg-6 text-lg-start text-center col-12 my-5">
            <h1 class="display-3 ">CityQuest, la solution pour comprendre la ville</h1>
            <p class="lead text-secondary">Une solution simple, ergonomique et facile d'utilisation pour découvrir et gérer les lieux et événements dans le monde entier !</p>
            <div class="row mt-5 justify-content-center justify-content-lg-start">
                <a href="carte.php"><button class="btn btn-danger btn-lg rounded-pill col-6">Commencer gratuitement</button></a>
            </div>
        </div>
        <div class="col-lg-6  d-lg-block d-none">
            <img src="img/gummy-city.svg" class="img-fluid" alt="">
        </div>
    </div>
    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="col-lg-6 mx-auto display-4">L'application CityQuest est désormais disponible !</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4 text-secondary">Après des mois de développement et de réflexion sur la manière de faire une application mobile respectant l'esprit du site tant apprécié, nous vous revenons avec un produit dont nous sommes fiers.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <button type="button" class="btn rounded-pill btn-danger btn-lg px-4"><i class="fab fa-app-store"></i> Apple Store</button>
                <button type="button" class="btn btn-outline-danger rounded-pill btn-lg px-4 me-sm-3"><i class="fab fa-google-play"></i> Google Play</button>
            </div>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="img/mockup.png" class="img-fluid mb-4" alt="Example image" width="700" height="500" loading="lazy">
            </div>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-md-4  col-12">
            <div class="card text-center my-5 border-0">
                <div class="col d-flex justify-content-center">
                    <img src="img/trust.svg" class="w-50 p-4" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Une communauté active</h5>
                    <p class="card-text text-secondary">Tout le projet se base sur une participation active de la communauté CityQuest.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4  col-12">
            <div class="card text-center my-5 border-0">
                <div class="col d-flex justify-content-center">
                    <img src="img/medal.svg" class="w-50 p-4" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Mises en avant pertinentes</h5>
                    <p class="card-text text-secondary">Afin d'aider les établissements avec le plus de potentiel, nous les mettons personnellement en avant.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4  col-12">
            <div class="card text-center my-5 border-0">
                <div class="col d-flex justify-content-center">
                    <img src="img/security.svg" class="w-50 p-4" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Données publiques mais protégées</h5>
                    <p class="card-text text-secondary">Avec notre analyste en cyber-sécurité Maxence, nous pouvons vous certifier une sécurité infaillible.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="img/screenshot.png" class="d-block mx-lg-auto img-fluid border rounded-3 shadow-sm" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 lh-1 mb-3">Plus qu'un outil,<br> un endroit de discussion.</h1>
            <p class="lead text-secondary">Avant d'être une application web, CityQuest est un lieu de partage entre les baroudeurs des villes qui aiment découvrir des parties inconnues de chez eux ou d'ailleurs.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="carte.php"><button type="button" class="btn btn-danger rounded-pill btn-lg px-4 me-md-2">Nous rejoindre</button></a>
                <a href="offres.php"><button type="button" class="btn btn-outline-danger rounded-pill btn-lg px-4">Voir les offres</button></a>
            </div>
        </div>
    </div>
</div>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>
