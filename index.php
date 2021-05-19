<?php 
define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", "");
require_once("inc/views/head.inc.php"); 

if (isset($_SESSION["email"])) { require_once("inc/views/headerConnecte.inc.php"); }
else { require_once("inc/views/header.inc.php"); }

?>

<div class="container">
    <div class="row align-items-center border-bottom">
        <div class="col-lg-6 text-lg-start text-center col-12 my-5">
            <h1 class="display-3">CityQuest, la solution pour comprendre la ville</h1>
            <p class="lead text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <div class="row mt-5 justify-content-center justify-content-lg-start">
                    <a href="carte.php"><button class="btn btn-danger btn-lg rounded-pill col-6">Commencer gratuitement</button></a>
            </div>
        </div>
        <div class="col-lg-6  d-lg-block d-none">
            <img src="img/gummy-city.svg" class="img-fluid" alt="">
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-md-4  col-12">
            <div class="card text-center my-5 border-0">
                <div class="col d-flex justify-content-center">
                <img src="img/no-racism.svg" class="w-50 p-4" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Philip J. Fry</h5>
                    <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4  col-12">
            <div class="card text-center my-5 border-0">
                <div class="col d-flex justify-content-center">
                <img src="img/protection.svg" class="w-50 p-4" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Pennywise le grippesou</h5>
                    <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4  col-12">
            <div class="card text-center my-5 border-0">
                <div class="col d-flex justify-content-center">
                <img src="img/reliability.svg" class="w-50 p-4" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Mario l'italien</h5>
                    <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center my-5 border-bottom">
        <h1 class="display-6">CityQuest, la solution pour comprendre la ville</h1>
        <p class="lead mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem excepturi fuga nisi officia voluptates adipisci, doloribus, quis ducimus ipsum consequatur ab minus quidem sapiente numquam, porro aliquam. Eum, reprehenderit itaque.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem excepturi fuga nisi officia voluptates adipisci, doloribus, quis ducimus ipsum consequatur ab minus quidem sapiente numquam, porro aliquam. Eum, reprehenderit itaque.</p>
    </div>
    <div class="row my-5">
        <div class="col-6">
            <h1 class="">CityQuest, la solution pour comprendre la ville</h1>
            <p class=" mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem excepturi fuga nisi officia voluptates adipisci, doloribus, quis ducimus ipsum consequatur ab minus quidem sapiente numquam, porro aliquam. Eum, reprehenderit itaque.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem excepturi fuga nisi officia voluptates adipisci, doloribus, quis ducimus ipsum consequatur ab minus quidem sapiente numquam, porro aliquam. Eum, reprehenderit itaque.</p>
        </div>
        <div class="col-6">
            <h1 class="">CityQuest, la solution pour comprendre la ville</h1>
            <p class=" mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem excepturi fuga nisi officia voluptates adipisci, doloribus, quis ducimus ipsum consequatur ab minus quidem sapiente numquam, porro aliquam. Eum, reprehenderit itaque.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem excepturi fuga nisi officia voluptates adipisci, doloribus, quis ducimus ipsum consequatur ab minus quidem sapiente numquam, porro aliquam. Eum, reprehenderit itaque.</p>
        </div>
    </div>
</div>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>