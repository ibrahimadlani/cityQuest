<?php
session_start();

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'><link rel='stylesheet' href='css/offres.css'>");
define("TITLE", "Offres - ");

require_once("inc/views/head.inc.php");
require_once("inc/views/header.inc.php");
?>
<main class="container container-main py-3 my-5">
  <div class="text-center mb-5">
    <h1 class="display-4">Boostez l'influence<br>de votre etablissement !</h1>
    <p class="lead text-secondary">En sousscrivant à l'une de nos offres qui s'adaptera le mieux à vos besoins.</p>

  </div>
  <hr class="mb-5">
  <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3">
          <img src="img/no-racism.svg" class="w-50 p-4" alt="...">
          <h4 class="my-0 fw-normal">Gratuit</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">€0<small class="text-muted fw-light">/mois</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>Utilisateur lambda</li>
            <li>Accès aux lieux et événements</li>
            <li>Ajouter de une photo par lieu</li>
            <li>Ajouter des commentaires</li>
          </ul>
          <?php
          if (isset($_SESSION["email"])) {
            echo '<button type="button" class="w-100 btn btn-lg btn-outline-danger disabled rounded-pill">Déjà connecté</button>';
          } else {
            echo '<a type="button" class="w-100 btn btn-lg btn-outline-danger rounded-pill" href="connexion.php">Sign up for free</a>';
          }
          ?>

        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3">
          <img src="img/reliability.svg" class="w-50 p-4" alt="...">
          <h4 class="my-0 fw-normal">Pro</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">€15<small class="text-muted fw-light">/mois</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>Ajout d'un lieu propriétaire</li>
            <li>Ajout de 5 photos</li>
            <li>Support client basique</li>
            <li>Possibilité de se faire référencer par le site</li>
          </ul>
          <button type="button" class="w-100 btn btn-lg btn-danger rounded-pill">Commencer</button>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mb-4 rounded-3 shadow-sm border-danger">
        <div class="card-header py-3 text-white bg-danger border-danger">
          <img src="img/protection.svg" class="w-50 p-4" alt="...">
          <h4 class="my-0 fw-normal">Enterprise</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">€29<small class="text-muted fw-light">/mois</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>Création et gestion de lieux</li>
            <li>Photos illimitées</li>
            <li>Meilleur référencement</li>
            <li>Support 24/24 7/7</li>
          </ul>
          <button type="button" class="w-100 btn btn-lg btn-danger rounded-pill">Nous contacter</button>
        </div>
      </div>
    </div>
  </div>

  <h2 class="display-6 text-center mb-4">Comparez les opportunités</h2>

  <div class="table-responsive">
    <table class="table text-center">
      <thead>
        <tr>
          <th style="width: 34%;"></th>
          <th style="width: 22%;">Gratuit</th>
          <th style="width: 22%;">Pro</th>
          <th style="width: 22%;">Enterprise</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row" class="text-start">Public</th>
          <td><i class="fas fa-check text-danger"></i></svg></td>
          <td><i class="fas fa-check text-danger"></i></svg></td>
          <td><i class="fas fa-check text-danger"></i></svg></td>
        </tr>
        <tr>
          <th scope="row" class="text-start">Private</th>
          <td></td>
          <td><i class="fas fa-check text-danger"></i></svg></td>
          <td><i class="fas fa-check text-danger"></i></svg></td>
        </tr>
      </tbody>

      <tbody>
        <tr>
          <th scope="row" class="text-start">Permissions</th>
          <td><i class="fas fa-check text-danger"></i></svg></td>
          <td><i class="fas fa-check text-danger"></i></svg></td>
          <td><i class="fas fa-check text-danger"></i></svg></td>
        </tr>
        <tr>
          <th scope="row" class="text-start">Sharing</th>
          <td></td>
          <td><i class="fas fa-check text-danger"></i></svg></td>
          <td><i class="fas fa-check text-danger"></i></svg></td>
        </tr>
        <tr>
          <th scope="row" class="text-start">Unlimited members</th>
          <td></td>
          <td><i class="fas fa-check text-danger"></i></svg></td>
          <td><i class="fas fa-check text-danger"></i></svg></td>
        </tr>
        <tr>
          <th scope="row" class="text-start">Extra security</th>
          <td></td>
          <td></td>
          <td><i class="fas fa-check text-danger"></i></svg></td>
        </tr>
      </tbody>
    </table>
  </div>
</main>


<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>
