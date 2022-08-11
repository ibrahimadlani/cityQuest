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
        <p class="mb-0" id="adresseCustom"><b><?php echo $_POST["jsonFile"]["results"][0]["formatted_address"]; ?></b></p>
        <p class="mb-0" id="locationCustom"><?php echo $_POST["jsonFile"]["results"][0]["geometry"]["location"]["lat"] . ", " . $_POST["jsonFile"]["results"][0]["geometry"]["location"]["lng"] ?></p>
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
                <select class="form-select border-danger rounded-5" id="typeLieuCustom2">
                    <option value="0" disabled selected>Type de lieu</option>
                    <?php foreach ($_POST["typesLieu"] as $tl) {
                        echo "<option value='" . $tl["id"] . "'>" . $tl["type"] . "</option>";
                    } ?>
                </select>
            </div>
            <div class="btn-group btn-group-toggle d-flex col-6 justify-content-center" data-toggle="buttons">
                <input type="radio" class="btn-check" name="optionsAjouter" id="checkAjouterLieu" value="lieu" autocomplete="off" checked>
                <label class="btn btn-md btn-danger rounded-pill rounded-end" for="checkAjouterLieu" onclick="afficherHoraire()">Lieu</label>

                <input type="radio" class="btn-check" name="optionsAjouter" id="checkAjouterEvenement" value="evenement" autocomplete="off">
                <label class="btn btn-md btn-danger rounded-pill rounded-start" for="checkAjouterEvenement" onclick="cacherHoraire()">Evenement</label>
            </div>
            <div id="container" class="container d-flex flex-column justify-content-center align-items-center" style="">

    <!-- <div id="horaireForm" class="container d-flex flex-column justify-content-center align-items-center mt-3" style="">

        <div id="horaire" class="d-flex flex-column justify-content-center align-items-center mt-3">

            <div class="hour-box border border-danger rounded p-3" style="width: 600px">
                <div class="row">
                    <div class="col-md-6">
                        <p>ouvre à</p>
                    </div>
                    <div class="col-md-6">
                        <p>ferme à</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input class="w-100" type="time" name="" id="">
                    </div>
                    <div class="col-md-6">
                        <input class="w-100" type="time" name="" id="">
                    </div>
                </div>

                <div class="w-100 d-flex justify-content-around align-items-center mt-3">
                    <div>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Lun</label>
                    </div>

                    <div>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Mar</label>
                    </div>

                    <div>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Mer</label>
                    </div>

                    <div>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Jeu</label>
                    </div>

                    <div>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Ven</label>
                    </div>

                    <div>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Sam</label>
                    </div>

                    <div>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Dim</label>
                    </div>

                </div>

            </div>


        </div>



    </div> -->

    <!-- <p class="mt-2 fake-link" style="color : blue; cursor: pointer;" onclick="ajouterhoraire()"><u>+ ajouter plus</u></p> -->

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
        nom = $("#nom").val();
        description = $("#description").val();
        presentation = $("#presentation").val();
        typeLieuCustom = $("#typeLieuCustom2").val();
        adresseCustom = $("#adresseCustom").text();
        adresseCustom = adresseCustom.split(",");
        locationCustom = $("#locationCustom").text();
        locationCustom = locationCustom.split(",");
    
        liste = [nom, description, presentation, adresseCustom[0],locationCustom[0], locationCustom[1].replace(" ", ""), adresseCustom[1].split(" ")[2].replace(" ", ''), typeLieuCustom, "1"];

        console.log(liste);

        addLieuBDD(nom, description, presentation, adresseCustom[0],locationCustom[0], locationCustom[1].replace(" ", ""), 1, typeLieuCustom, "1");
        alert('Votre demande a bien été prise en compte, elle sera validée sous peu');
    }

    function cacherHoraire() {
        $("#divHoraire").hide();
    }

    function afficherHoraire() {
        $("#divHoraire").show();
    }

    function ajouterhoraire() {
        $('#horaire').clone().appendTo("#horaireForm");
    }
</script>