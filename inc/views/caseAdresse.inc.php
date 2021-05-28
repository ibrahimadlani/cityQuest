<?php
session_start();

// Boucle qui retrouve le nom de la municipalité du lieu recherché par l'utilisateur
foreach ($_POST["jsonFile"]["results"][0]["address_components"] as $ac) {
    if ($ac["types"][0] == "locality") {
        $ville = $ac["long_name"];
        break;
    }
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
                    <?php foreach ($_POST["typeLieu"] as $tl) {
                        echo "<option value='" . $tl["id"] . "'>" . $tl["type"] . "</option>";
                    } ?>
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

        <button type="button" class="btn btn-sm btn-danger rounded-pill px-3" data-bs-toggle="collapse" data-bs-target="#fenetreAjouter" onclick="addLieuBDD(document.getElementById('nom').value,document.getElementById('desc').value,document.getElementById('pres').value,'<?php echo $_POST['jsonFile']['results'][0]['formatted_address']; ?>',<?php echo $_POST['jsonFile']['results'][0]['geometry']['location']['lat']; ?>,<?php echo $_POST['jsonFile']['results'][0]['geometry']['location']['lng']; ?>,parseInt(document.getElementById('ville2').value),parseInt(document.getElementById('typeLieu').value),<?php echo $_SESSION['id']; ?>);">Ajouter un lieu</button>
        <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3" data-bs-toggle="collapse" data-bs-target="#fenetreAjouter" onclick="console.log(document.getElementById('nom').value,document.getElementById('desc').value,document.getElementById('pres').value,'<?php echo $_POST['jsonFile']['results'][0]['formatted_address']; ?>',<?php echo $_POST['jsonFile']['results'][0]['geometry']['location']['lat']; ?>,<?php echo $_POST['jsonFile']['results'][0]['geometry']['location']['lng']; ?>,parseInt(document.getElementById('ville').value),parseInt(document.getElementById('typeLieu').value),<?php echo $_SESSION['id']; ?>);">Ajouter un evenement</button>
    </div>
</div>
