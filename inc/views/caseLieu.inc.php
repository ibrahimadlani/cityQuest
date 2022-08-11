<?php
session_start();
require_once('../../config/db.php');
require_once('../../lib/pdo_db.php');
include_once('../../models/Avis.php');
$avis = new Avis();
?>

<?php
foreach ($_POST["jsonFile"] as $l) {

    $etoilesPleines = ($l['note'] - ($l['note'] % 2)) / 2;
    $demiEtoile = $l['note'] % 2;
    $pasetoile = 5 - $etoilesPleines - $demiEtoile;
?>
    <div class="row">
        <div class="my-3 p-4  border rounded" id="<?php echo $l["id"]; ?>">
            <?php if ($l["promotion"] >= "2") {
                echo "<span class='badge bg-warning mb-3'><i class='fas fa-certificate'></i> Contenu Sponsorisé</span>";
            } elseif ($l["promotion"] == "1") {
                echo "<span class='badge bg-danger mb-3'><i class='fas fa-heart'></i> Coup de cœur CityQuest</span>";
            }
            ?>
            <h2 class="display-6"><?php echo $l["nom"]; ?></h2>
            <p class="lead mb-0"><?php echo $l["description"]; ?></p>
            <div class="row">
                <div class="d-flex justify-content-between">
                    <small class="text-warning align-middle">
                        <?php for ($i = 0; $i < $etoilesPleines; $i++) { ?>
                            <i class="fas fa-star"></i>
                        <?php } ?>
                        <?php for ($i = 0; $i < $demiEtoile; $i++) { ?>
                            <i class="fas fa-star-half-alt"></i>
                        <?php } ?>
                        <?php for ($i = 0; $i < $pasetoile; $i++) { ?>
                            <i class="far fa-star"></i>
                        <?php } ?>
                    </small>
                </div>
            </div>
            <hr>

            <div class="row mt-4">
                <div class="col-12 col-xl-12">
                    <h5 class="">Présentation</h5>
                    <p><?php echo $l["presentation"]; ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-lg-8 col-xl-12">

                            <h5 class="mt-5">Avis des utilisateurs</h5>
                            <?php foreach ($avis->getAvisLieu($l["id"]) as $av) { ?>
                                <div class="row p-2">
                                    <div class="d-flex pt-3 border-bottom rounded border p-3">
                                        <img class="me-3" src="img/avatar/<?php echo $av->avatar; ?>" alt="" height="32">
                                        <p class=" mb-0 small lh-sm text-dark">
                                            <strong class="d-block text-secondary"><?php echo $av->prenom . ' ' . $av->nom . ' le ' . date_format(new DateTime($av->date), 'd/m/Y'); ?></strong>
                                            <small class="text-warning">
                                                <?php
                                                $note = intval($av->note);
                                                $etoilesPleines = ($note - ($note % 2)) / 2;
                                                $demiEtoile = $note % 2;
                                                $pasetoile = 5 - $etoilesPleines - $demiEtoile;
                                                ?>
                                                <?php for ($i = 0; $i < $etoilesPleines; $i++) { ?>
                                                    <i class="fas fa-star"></i>
                                                <?php } ?>
                                                <?php for ($i = 0; $i < $demiEtoile; $i++) { ?>
                                                    <i class="fas fa-star-half-alt"></i>
                                                <?php } ?>
                                                <?php for ($i = 0; $i < $pasetoile; $i++) { ?>
                                                    <i class="far fa-star"></i>
                                                <?php } ?>
                                            </small><br>
                                            <?php echo $av->text; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row p-2">
                                <div class="d-flex pt-3 rounded  p-3">
                                    <img class="me-3 border rounded-pill p-1" src="img/avatar/<?php echo $_SESSION["avatar"]; ?>" alt="" height="50">
                                    <textarea name="" id="inputAvisId<?php echo $l["id"] ?>" rows="4" class="border w-100 rounded-3"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="px-2 mx-9">
                                        <select name="inputNote" id="inputNote<?php echo $l["id"] ?>" class="form-select rounded-pill px-3 mx-2">
                                            <option value="none" disabled selected>Note</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger rounded-pill px-3 mx-2" onclick="ajouterAvis(<?php echo '' . $l['id']; ?>, <?php echo $_SESSION['id'] ?>)">Poster</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>