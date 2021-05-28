<?php
define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", "Admin Panel -  ");

require_once("inc/views/head.inc.php");
?>

<main>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="img/cQ.svg" alt="" height="70" class="mr-3">
                <span class="fs-4">Admin Panel</span>
            </a>
        </header>

        <div class="p-5 mb-4 bg-white border border-danger rounded-3">
            <div class="container-fluid py-0">
                <h1 class="display-5 fw-bold">Menu</h1>
                <p class="lead">Toute les demandes emises par les users</p>
                <hr>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">Lieux</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">Evenement</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">Avis</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="collapse" data-bs-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4">Lieux</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="collapse" data-bs-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample5">Lieux</a>
                    </li>
                </ul>
                <div class="collapse multi-collapse" id="collapseExample1">
                    <div class="card card-body">
                    <h1 class="display-5 fw-bold">Lieux</h1>
                    <p class="lead">Gestionnaire de lieu</p>
                    <hr>
                    </div>
                </div>
                <div class="collapse multi-collapse" id="collapseExample2">
                    <div class="card card-body">
                    <h1 class="display-5 fw-bold">Lieux</h1>
                    <p class="lead">Gestionnaire de lieu</p>
                    <hr>
                    </div>
                </div>
                <div class="collapse multi-collapse" id="collapseExample3">
                    <div class="card card-body">
                    <h1 class="display-5 fw-bold">Lieux</h1>
                    <p class="lead">Gestionnaire de lieu</p>
                    <hr>
                    </div>
                </div>
                <div class="collapse multi-collapse" id="collapseExample4">
                    <div class="card card-body">
                    <h1 class="display-5 fw-bold">Lieux</h1>
                    <p class="lead">Gestionnaire de lieu</p>
                    <hr>
                    </div>
                </div>
                <div class="collapse multi-collapse" id="collapseExample5">
                    <div class="card card-body">
                    <h1 class="display-5 fw-bold">Lieux</h1>
                    <p class="lead">Gestionnaire de lieu</p>
                    <hr>
                    </div>
                </div>

            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5  bg-white border border-danger rounded-3">
                    <h1 class="display-5 fw-bold">Utilisateurs</h1>
                    <p class="lead">Gestionnaire d'utilisateurs</p>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5  bg-white border border-danger rounded-3">
                    <h1 class="display-5 fw-bold">Lieux</h1>
                    <p class="lead">Gestionnaire de lieu</p>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <footer class="pt-3 mt-4 text-muted border-top">
            © CityQuest 2020 - Tous Droits Réservés
        </footer>
    </div>
</main>

<?php require_once("inc/foot.inc.php"); ?>
