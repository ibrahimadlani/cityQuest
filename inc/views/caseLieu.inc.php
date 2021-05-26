<h3 class="display-6"><i class="fas fa-map-marked-alt text-danger"></i> Resultat</h3>
<hr>
<?php foreach ($_POST["jsonFile"] as $l) { ?>
    <div class="row">
        <?php

        $note = intval($l["note"]);
        $etoilesPleines = ($note - ($note % 2)) / 2;
        $demiEtoile = $note % 2;
        $pasetoile = 5 - $etoilesPleines - $demiEtoile;

        ?>
        <div class="my-3 p-4  border rounded" id="<?php echo $l["id"]; ?>">
            <?php if ($l["promotion"] == "2") {
                echo "<span class='badge bg-warning mb-3'><i class='fas fa-certificate'></i> Contenu Sponsorisé</span>";
            } elseif ($l["promotion"] == "1") {
                echo "<span class='badge bg-danger mb-3'><i class='fas fa-heart'></i> Coup de cœur CityQuest</span>";
            }
            ?>
            <h2 class="display-6"><?php echo $l["nom"]; ?></h2>
            <p class="lead mb-0"><?php echo $l["description"]; ?></p>
            <small class="text-warning">
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
            <hr>

            <div class="row mt-4">
                <div class="col-12 col-xl-9">
                    <h5 class="">Présentation</h5>
                    <p><?php echo $l["presentation"]; ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-lg-8 col-xl-12">
                            <h5 class="mt-5">Avis des utilisateurs</h5>
                            <div class="row p-2">
                                <div class="d-flex pt-3 border-bottom rounded border p-3">
                                    <img class="me-3" src="img/no-racism.svg" alt="" height="32">
                                    <p class=" mb-0 small lh-sm text-dark">
                                        <strong class="d-block text-secondary">Ibrahim ADLANI</strong>
                                        <small class="text-warning">


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
                            <div class="row p-2">
                                <div class="d-flex pt-3 rounded  p-3">
                                    <img class="me-3 border rounded-pill p-1" src="img/no-racism.svg" alt="" height="50">
                                    <textarea name="" id="" rows="4" class="border w-100 rounded-3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="col-12 d-xl-none d-block mt-4">

                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h5 class="">Horraire</h5><span class="badge bg-success badge-sm">Ouvert</span>
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

                <div class="col-3 d-none d-xl-block">

                    <div class="d-flex justify-content-between align-items-baseline">
                        <h5 class="">Horraire</h5><span class="badge bg-success badge-sm">Ouvert</span>
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

<?php } ?>