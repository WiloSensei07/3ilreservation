<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light  sticky-top" style="background-color: #d9d6d6;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index2.php"><img src="../img/logo-3il-groupe1.png" alt="Logo 3il"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index2.php">Accueil</a>
            </li>
            <li class="nav-item">
                <?php
                    if($_SESSION['role'] == 'etudiant')
                    {
                        echo ' <a class="nav-link" href="managebooking.php">Réservations</a>';
                    }
                ?>
            </li>
            <li class="nav-item">
                <form action="../controller/loginphp.php" method="post">
                    <button type="submit" class="btn btn-primary" name="deconnexion" style="border-radius: 10px;">Déconnexion</button>
                </form>
            </li>
        </ul>
    </div>
</nav>