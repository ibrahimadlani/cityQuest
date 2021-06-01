<?php
session_start();
if (!isset($_SESSION["email"])) {header('Location: connexion.php?error=connexionRequise');exit();}
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Utilisateur.php');

$utilisateur = new Utilisateur();
$utilisateurs = $utilisateur->getRandomProfiles($_SESSION["id"]);

define("CONSTANT", "<link rel='stylesheet' href='css/master.css'>");
define("TITLE", "Paramètre - ");

require_once("inc/views/head.inc.php");
require_once("inc/views/header.inc.php");
?>

<main class="container">
    <div class="row border my-3 rounded justify-content-center">
        <div class="col-12 pt-5 justify-content-center">
            <img class="rounded-pill mx-auto d-block" height="200" width="200" src="img/avatar/<?php echo $_SESSION["avatar"]; ?>" alt="">
            <h1 class="display-4 fw-bold text-center mb-0"><?php echo ucfirst($_SESSION["prenom"]) . " " . strtoupper($_SESSION["nom"]); ?></h1>
            <small class="text-center mx-auto d-block text-danger"><?php echo $_SESSION["email"]; ?> - Inscrit depuis le <?php echo strftime("%d/%m/%Y", strtotime($_SESSION["dateCreation"])); ?></small>
            <p class="lead col-12 col-md-8 col-lg-6 text-center mx-auto text-secondary"><?php echo $_SESSION["bio"]; ?></p>
        </div>
        <div class="col-12 bg-white py-3 ">
            <button id="editer" class="btn btn-danger rounded-pill mx-auto d-block px-4" data-bs-toggle="collapse" data-bs-target="#forms"">
                <i class="fas fa-edit" aria-hidden="true"></i> Editer mon profil
            </button>
        </div>

        <div class="row collapse multi-collapse" id="forms">
            <div class="col-12 col-md-8 col-lg-6 mx-auto my-3 pt-3 border-top">

                <form id="formulaire" action="inc/parametre.inc.php" method="POST" enctype="multipart/form-data">
                    <h3>Edition du profil</h3>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-6">
                            <label class="lead" for="">Prénom</label>
                            <input id="prenom" class="form-control border-danger rounded" type="text" placeholder="John" name="prenom" value="<?php echo $_SESSION["prenom"]; ?>">
                        </div>
                        <div class="col-6">
                            <label class="lead" for="">Nom</label>
                            <input id="nom" class="form-control border-danger rounded" type="text" placeholder="Smith" name="nom" value="<?php echo $_SESSION["nom"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <!-- <div class="col-8">
                            <label class="lead" for="">Adresse mail</label>
                            <input id="email" class="form-control border-danger rounded" type="text" placeholder="john.smith@email.com" name="mail" value="<?php echo $_SESSION["email"]; ?>">
                        </div> -->
                        <div class="col-12">
                            <label class="lead" for="">Photo de profil</label>
                            <input id="fileToUpload" class="form-control border-danger" name="fileToUpload" type="file" id="formFile">
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label class="lead" for="">Bio</label>
                            <textarea id="bio" class="form-control border-danger rounded" rows="3" placeholder="Je suis nouveau sur CityQuest !" name="bio"><?php echo $_SESSION["bio"]; ?></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <button class="btn btn-danger rounded-pill mx-auto d-block px-4" data-bs-toggle="collapse" data-bs-target="#forms" type="button" onclick="modifierParametre()"><i class="fas fa-check" aria-hidden="true"></i> Sauvegarder mon profil</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-danger rounded-pill mx-auto d-block px-4" data-bs-toggle="collapse" data-bs-target="#forms"><i class="fas fa-times" aria-hidden="true"></i> Annuler les modifications</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="my-3 p-3 bg-body rounded border row">
        <h6 class="pb-2 mb-0">Dernieres activités</h6>
        <div class="d-flex text-muted pt-3 border-top">
            <img class="me-3 rounded" src="img/avatar/<?php echo $_SESSION['avatar']; ?>" alt="" height="32">
            <p class="pb-3 mb-0 small lh-sm">
                <strong class="d-block text-gray-dark">Vous avez ajouté un lieu</strong>
                Le 10 Mai, Ibrahim a ajouté un lieu dans la ville : Sedan</strong>
            </p>
        </div>
        <div class="d-flex text-muted pt-3 border-top">
            <img class="me-3 rounded" src="img/avatar/<?php echo $_SESSION["avatar"]; ?>" alt="" height="32">
            <p class="pb-3 mb-0 small lh-sm">
                <strong class="d-block text-gray-dark">Vous avez ajouté un photo</strong>
                Le 10 Mai, Ibrahim a ajouté un photo dans un lieu : Iut Maubeuge</strong>
            </p>
        </div>
        <div class="d-flex text-muted pt-3 border-top">
            <img class="me-3 rounded" src="img/avatar/<?php echo $_SESSION["avatar"]; ?>" alt="" height="32">
            <p class="pb-3 mb-0 small lh-sm">
                <strong class="d-block text-gray-dark">Vous avez ajouté un avis</strong>
                Le 10 Mai, Ibrahim a ajouté un avis dans un lieu : Iut Maubeuge</strong>
            </p>
        </div>

    </div>

    <div class="my-3 p-3 bg-body rounded border row">
        <h6 class="border-bottom pb-2 mb-0">Suggestions de profils</h6>

        <?php
        foreach ($utilisateurs as $key => $user) {
            $prenom = $user->prenom;
            $nom = $user->nom;
            $bio = $user->bio;
            $avatar = $user->avatar;
            $id = $user->id;

            echo '
            <div class="d-flex text-muted pt-3">
                <img class="me-3 rounded" src="img/avatar/' . $avatar . '" alt="" height="32">
                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                    <div class="d-flex justify-content-between">
                        <strong class="text-gray-dark">' . $prenom . ' ' . $nom . '</strong>
                        <a href="profil.php?id=' . $id . '" class="text-danger">Voir le profil</a>
                    </div>
                    <span class="d-block">' . $bio . '</span>
                </div>
            </div>
            ';
        }
        ?>

        <!--<small class="d-block text-end mt-3">
            <a href="#" class="text-danger">Raffraichir les suggestions</a>
        </small>-->
    </div>
</main>

<?php require_once("inc/views/footer.inc.php"); ?>
<?php require_once("inc/views/foot.inc.php"); ?>


<script>
function modifierParametre(){
    formu = $('#formulaire').serialize();
    $.ajax({
    url : './inc/parametre.inc.php', // La ressource ciblée
    type : 'POST', // Le type de la requête HTTP.
    data : formu,
    dataType : 'html',
    success: function(data){
      //document.location.reload();
    }
  });
}


</script>
