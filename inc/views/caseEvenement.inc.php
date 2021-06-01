<?php
session_start();
require_once('../../config/db.php');
require_once('../../lib/pdo_db.php');
?>

<?php foreach ($_POST["jsonFile"] as $e) {?>
    <div class="row" data-bs-toggle="collapse">
        <div class="my-3 p-4  border rounded" id="<?php echo $e["id"]; ?>">
            <div class="col-12">
                <h1 class="fw-bold text-center"><?php echo $e['nom']; ?></h1>
                <p class="mb-0  text-center"><span class="lead "><?php echo $e['description']; ?></span><br><small class="text-danger"><?php echo 'du ' . date_format(new DateTime($e['debut']), 'd/m/Y') . ' au ' . date_format(new DateTime($e['fin']), 'd/m/Y'); ?></small></p>
            </div>
        </div>
    </div>
<?php } ?>
<hr>
