<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <div class="container">
        <a class="navbar-brand d-lg-none d-block" href="#" style="width:258px;"><img src="img/cityQuest.svg" alt="" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  justify-content-between text-center" id="navbarNav">
            <a class="navbar-brand d-none d-lg-block" href="#" style="width:258px;"><img src="img/cityQuest.svg" alt="" height="50"></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link px-3" href="index.php">A C C U E I L</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="carte.php">C A R T E</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="offres.php">O F F R E S</a>
                </li>
            </ul>
            <ul class="navbar-nav d-none d-lg-flex">

                <?php
                if (isset($_SESSION["email"])) {
                    echo "
                    <li class='nav-item'>
                        <a class='nav-link px-3 border-start border-end' href='parametre.php'><i class='fas fa-sign-in-alt'></i> Paramètre</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link px-3 border-start border-end' href='inc/deconnexion.inc.php'><i class='fas fa-sign-in-alt'></i> Deconnexion</a>
                    </li>
                    ";
                } else {
                    echo "
                    <li class='nav-item'>
                        <a class='nav-link px-3 border-start border-end' href='connexion.php'><i class='fas fa-sign-in-alt'></i> Connexion</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link px-3 border-start border-end' href='inscription.php'><i class='far fa-user'></i> Inscription</a>
                    </li>
                    ";
                }
                ?>
            </ul>
            <ul class="navbar-nav d-lg-none">
                <?php
                if (isset($_SESSION["email"])) {
                    echo "
                    <li class='nav-item'>
                        <a class='nav-link px-3 border-top' href='parametre.php'><i class='fas fa-cog'></i> Paramètre</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link px-3 border-top' href='inc/deconnexion.inc.php'><i class='fas fa-sign-in-alt'></i> Deconnexion</a>
                    </li>
                    ";
                } else {
                    echo "
                    <li class='nav-item'>
                        <a class='nav-link px-3 border-top' href='connexion.php'><i class='fas fa-sign-in-alt'></i> Connexion</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link px-3 border-top' href='connexion.php'><i class='far fa-user'></i> Inscription</a>
                    </li>
                    ";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>