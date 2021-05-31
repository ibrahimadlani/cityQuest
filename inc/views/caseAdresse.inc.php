<?php
session_start();

//Cherche la ville associée à l'adresse
$city = null;
$country = null;
foreach ($_POST['jsonFile']['results'][0]['address_components'] as $address_component) {
    $isLocality = false;
    $isPolitical = false;
    $isCountry = false;
    foreach ($address_component['types'] as $component_type) {
        if ($component_type == 'locality') {
            $isLocality = true;
        }
        if ($component_type == 'political') {
            $isPolitical = true;
        }
        if ($component_type == 'country') {
            $isCountry = true;
        }
        if (($isLocality || $isCountry) && $isPolitical) {
            break;
        }
    }
    if ($isLocality && $isPolitical) {
        $city = $address_component['long_name'];
    } else if ($isCountry && $isPolitical) {
        $country = $address_component['long_name'];
    }
    if ($city != null && $country != null) {
        break;
    }
}
if ($city == null || $country == null) {
    $city = null;
    $country = null;
}
?>
<div class="card mb-4 rounded-3 shadow-sm mt-3">
    <div class="card-header py-3 bg-danger text-white">
        <p class="mb-0"><b><?php echo $_POST["jsonFile"]["results"][0]["formatted_address"]; ?></b></p>
        <p class="mb-0"><?php echo $_POST["jsonFile"]["results"][0]["geometry"]["location"]["lat"] . ", " . $_POST["jsonFile"]["results"][0]["geometry"]["location"]["lng"] ?></p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <input class="form-control border-danger  rounded-5" type="text" placeholder="Titre de ce point" id="nom" />
            </div>
            <div class="col-6">
                <input class="form-control border-danger  rounded-5" type="text" placeholder="Courte description" id="description" />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <textarea class="form-control border-danger rounded-5" rows="3" placeholder="Présentation du point" id="presentation"></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <select class="form-select border-danger rounded-5" id="typeLieu">
                    <option selected value="0">Type de lieu</option>
                    <?php foreach ($_POST["typesLieu"] as $tl) {
                        echo "<option value='" . $tl["id"] . "'>" . $tl["type"] . "</option>";
                    } ?>
                </select>
            </div>
            <div class="btn-group btn-group-toggle d-flex col-6 justify-content-center" data-toggle="buttons">
                <input type="radio" class="btn-check" name="optionsAjouter" id="checkAjouterLieu" value="lieu" autocomplete="off" checked>
                <label class="btn btn-md btn-danger rounded-pill rounded-end" for="checkAjouterLieu">Lieu</label>

                <input type="radio" class="btn-check" name="optionsAjouter" id="checkAjouterEvenement" value="evenement" autocomplete="off">
                <label class="btn btn-md btn-danger rounded-pill rounded-start" for="checkAjouterEvenement">Evenement</label>
            </div>
            <form action="" id="horaire">
                <div class="border-danger rounded-5" id="divHoraire">
                    <?php
                    $Jours = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
                    for ($i = 1; $i <= 7; $i++) {
                        $i1 = $i + 1;
                        $i2 = $i + 2;
                        $i3 = $i + 3;
                        echo "
                <div class='mb-3'>
                  <label for='description' class='col-form-label'>" . $Jours[$i - 1] . "</label>
                  <div class='row'>
                    <div class='col-6'>
                      <div class='row align-items-center'>
                        <div class='col-1 d-flex justify-content-center'>
                          <p>De</p>
                        </div>
                        <div class='col-5'>
                          <p><input type='number' class='form-control' name='heure" . $i . "' id='heure" . $i . "' placeholder='hh:mm'></p>
                        </div>
                        <div class='col-1 d-flex justify-content-center'>
                          <p>à</p>
                        </div>
                        <div class='col-5'>
                          <p><input type='number' class='form-control' name='heure" . $i1 . "' id='heure" . $i1 . "' placeholder='hh:mm'></p>
                        </div>
                      </div>
                    </div>
                    <div class='col-6'>
                      <div class='row align-items-center'>
                        <div class='col-1 d-flex justify-content-center'>
                          <p>De</p>
                        </div>
                        <div class='col-5'>
                          <p><input type='number' class='form-control' name='heure" . $i2 . "' id='heure" . $i2 . "' placeholder='hh:mm'></p>
                        </div>
                        <div class='col-1 d-flex justify-content-center'>
                          <p>à</p>
                        </div>
                        <div class='col-5'>
                          <p><input type='number' class='form-control' name='heure" . $i3 . "' id='heure" . $i3 . "' placeholder='hh:mm'></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                ";
                    }

                    ?>
                </div>
            </form>
        </div>
        <hr>

        <button type="button" class="btn btn-sm btn-danger rounded-pill px-3" onclick="createLieu()" data-bs-toggle="collapse" data-bs-target="#fenetreAjouter">Ajouter</button>

    </div>
</div>

<script>
    function getRadioValue() {
        return $('input[name="optionsAjouter"]:checked').val();
    }

    function createLieu() {
        const idVille = addVilleIfNotExistsBDD("<?php echo $city; ?>", "<?php echo $country; ?>");



        if (getRadioValue() === 'lieu') {
            addLieuBDD(
                document.getElementById('nom').value,
                document.getElementById('description').value,
                document.getElementById('presentation').value,
                $("#horaire").serialize(),
                "<?php echo $_POST['jsonFile']['results'][0]['formatted_address']; ?>",
                <?php echo $_POST['jsonFile']['results'][0]['geometry']['location']['lat']; ?>,
                <?php echo $_POST['jsonFile']['results'][0]['geometry']['location']['lng']; ?>,
                idVille,
                parseInt(document.getElementById('typeLieu').value),
                <?php echo $_SESSION['id']; ?>
            )
        }

        alert('Votre demande a bien été prise en compte, elle sera validée sous peu');
    }

    function cacherHoraire() {
        $("#divHoraire").hide();
    }

    function afficherHoraire() {
        $("#divHoraire").show();
    }
</script>