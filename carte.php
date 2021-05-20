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
<div id="contmap">
<div id="map"></div>
</div>

<div class="container my-5">
    <div class="row">
        <form class="col-12 col-lg-6">
            <h3 class="display-6"><i class="fas fa-search-location text-danger"></i> Rechercher</h3>
            <hr>
            <div class="row">
                <div class="col-6">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example" id="ville" onchange="updateMap();">
                    <option selected value="0">Ville</option>
                    <?php foreach ($villes as $v) {echo "<option value='" . $v->id . "'>" . $v->ville . "</option>";}?>
                    </select>
                </div>
                <div class="col-6">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example" id="type" onchange="updateMap();">
                    <option selected value="0">Type</option>
                    <?php foreach ($typeslieu as $tl) {echo "<option value='" . $tl->id . "'>" . $tl->type . "</option>";}?>
                    </select>
                </div>

            </div>
        </form>
        <form class="col-6">
            <h3 class="display-6"><i class="fas fa-map-pin text-danger"></i> Ajouter</h3>
            <hr>
            <div class="row">
                <div class="col-4">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example">
                    <option selected>Ville</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-4">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example">
                    <option selected>Type</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-4">
                    <select class="form-select border-danger rounded-pill" aria-label="Default select example">
                    <option selected>Disponibilité</option>
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
            <h3 class="display-6"><i class="fas fa-map-marked-alt text-danger"></i> Resultat</h3>
            <hr>
            <div class="row">
                <div class="my-3 p-4  border rounded">
                    <span class="badge bg-warning mb-3"><i class="fas fa-certificate"></i> Contenu Sponsorisé</span>
                    <h2 class="display-6">Cinq-Cinq</h2>
                    <p class="lead mb-0">Lorem ipsum dolor sit amet consectetur.</p>
                    <small class="text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                    </small>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-9">
                            <h5 class="">Présentation</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus suscipit aliquam mollitia fugiat perspiciatis! Culpa placeat magni iure ea tempora aliquam, quas quis aperiam quidem voluptatem, quo, voluptates neque voluptas!
                            Unde incidunt, cumque enim dolores quidem ipsam ab ut dicta delectus maiores reprehenderit alias aliquam fuga voluptatem nesciunt cum sapiente odit quo adipisci amet! Aperiam deleniti veritatis nesciunt quae molestiae.
                            Labore, velit. Repudiandae labore autem, voluptates excepturi adipisci omnis commodi magnam necessitatibus ut dolor. Laborum a reprehenderit ullam ipsam quibusdam quos repellendus, totam molestias quis nihil modi minima, aliquam deserunt.</p>
                            <hr>
                            <h5 class="mt-5">Avis des utilisateurs</h5>
                            <div class="row p-2">
                                <div class="d-flex pt-3 border-bottom rounded border p-3">
                                <img class="me-3" src="img/no-racism.svg" alt="" height="32">
                                <p class=" mb-0 small lh-sm text-dark">
                                <strong class="d-block text-secondary">Ibrahim ADLANI</strong>
                                <small class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </small><br>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid unde libero, tempore nisi architecto magni delectus.</strong>
                                </p>
                                </div>
                                
                            </div>
                            <div class="row p-2">
                                <div class="d-flex pt-3 border-bottom rounded border p-3">
                                <img class="me-3" src="img/no-racism.svg" alt="" height="32">
                                <p class=" mb-0 small lh-sm text-dark">
                                <strong class="d-block text-secondary">Ibrahim ADLANI</strong>
                                <small class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </small><br>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid unde libero, tempore nisi architecto magni delectus.</strong>
                                </p>
                                </div>
                                
                            </div>
                            <div class="row p-2">
                                <div class="d-flex pt-3 border-bottom rounded border p-3">
                                <img class="me-3" src="img/no-racism.svg" alt="" height="32">
                                <p class=" mb-0 small lh-sm text-dark">
                                <strong class="d-block text-secondary">Ibrahim ADLANI</strong>
                                <small class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </small><br>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid unde libero, tempore nisi architecto magni delectus.</strong>
                                </p>
                                </div>
                                
                            </div>

                            
                        </div>
                        <div class="col-3">
                        
                            <div class="d-flex justify-content-between align-items-baseline">
                            <h5 class="">Horraire </h5><span class="badge bg-success badge-sm">Ouvert</span>
                            </div>
                            
                            <p class="text-secondary  mb-0 mt-3">Lundi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                    
                            <p class="text-secondary  mb-0 mt-3">Mardi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                                                
                            <p class="text-secondary  mb-0 mt-3">Mercredi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                                                
                            <p class="text-secondary  mb-0 mt-3">Jeudi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                                                
                            <p class="text-secondary  mb-0 mt-3">Vendredi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                                                
                            <p class="text-secondary  mb-0 mt-3">Samedi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="my-3 p-4  border rounded">
                    <span class="badge bg-danger mb-3"><i class="fas fa-heart"></i> Coup de coeur CityQuest</span>
                    <h2 class="display-6">Cinq-Cinq</h2>
                    <p class="lead mb-0">Lorem ipsum dolor sit amet consectetur.</p>
                    <small class="text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                    </small>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-9">
                            <h5 class="">Présentation</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus suscipit aliquam mollitia fugiat perspiciatis! Culpa placeat magni iure ea tempora aliquam, quas quis aperiam quidem voluptatem, quo, voluptates neque voluptas!
                            Unde incidunt, cumque enim dolores quidem ipsam ab ut dicta delectus maiores reprehenderit alias aliquam fuga voluptatem nesciunt cum sapiente odit quo adipisci amet! Aperiam deleniti veritatis nesciunt quae molestiae.
                            Labore, velit. Repudiandae labore autem, voluptates excepturi adipisci omnis commodi magnam necessitatibus ut dolor. Laborum a reprehenderit ullam ipsam quibusdam quos repellendus, totam molestias quis nihil modi minima, aliquam deserunt.</p>
                            <hr>
                            <h5 class="mt-5">Avis des utilisateurs</h5>
                            <div class="row p-2">
                                <div class="d-flex pt-3 border-bottom rounded border p-3">
                                <img class="me-3" src="img/no-racism.svg" alt="" height="32">
                                <p class=" mb-0 small lh-sm text-dark">
                                <strong class="d-block text-secondary">Ibrahim ADLANI</strong>
                                <small class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </small><br>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid unde libero, tempore nisi architecto magni delectus.</strong>
                                </p>
                                </div>
                                
                            </div>
                            <div class="row p-2">
                                <div class="d-flex pt-3 border-bottom rounded border p-3">
                                <img class="me-3" src="img/no-racism.svg" alt="" height="32">
                                <p class=" mb-0 small lh-sm text-dark">
                                <strong class="d-block text-secondary">Ibrahim ADLANI</strong>
                                <small class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </small><br>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid unde libero, tempore nisi architecto magni delectus.</strong>
                                </p>
                                </div>
                                
                            </div>
                            <div class="row p-2">
                                <div class="d-flex pt-3 border-bottom rounded border p-3">
                                <img class="me-3" src="img/no-racism.svg" alt="" height="32">
                                <p class=" mb-0 small lh-sm text-dark">
                                <strong class="d-block text-secondary">Ibrahim ADLANI</strong>
                                <small class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </small><br>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid unde libero, tempore nisi architecto magni delectus.</strong>
                                </p>
                                </div>
                                
                            </div>

                            
                        </div>
                        <div class="col-3">
                        
                        <h5 class="">Horraire</h5>
                            
                            <p class="text-secondary  mb-0 mt-3">Lundi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                    
                            <p class="text-secondary  mb-0 mt-3">Mardi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                                                
                            <p class="text-secondary  mb-0 mt-3">Mercredi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                                                
                            <p class="text-secondary  mb-0 mt-3">Jeudi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                                                
                            <p class="text-secondary  mb-0 mt-3">Vendredi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                                                
                            <p class="text-secondary  mb-0 mt-3">Samedi</p>
                            <hr class="my-1">
                            <div class="row d-flex justify-content-center">
                                <p class="col text-start m-0">08:00 - 12:30</p>
                                <p class="col text-end m-0">14:00 - 18:30</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            
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