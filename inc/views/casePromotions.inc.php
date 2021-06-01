<?php
session_start();
require_once('../../config/db.php');
require_once('../../lib/pdo_db.php');
include_once('../../models/Avis.php');
$avis = new Avis();
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php
        $count = 0;
        foreach ($_POST["jsonFile"] as $l) {
            if ($l['promotion'] == 3) {
                if ($count == 0) { echo '<div class="carousel-item active">'; }
                else { echo '<div class="carousel-item">'; }
        ?>
            <img src="./img/iconsLieu/<?php echo $l['icone'] ?>" height="50" style="white-space: nowrap"><p><?php echo $l['nom']; ?></p>
            <h2 class="display-6"><?php echo $l["nom"]; ?></h2>
            <p class="lead mb-0"><?php echo $l["description"]; ?></p>
        </div>
        <?php }} ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
