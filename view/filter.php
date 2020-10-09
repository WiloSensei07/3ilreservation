
<div class="col-lg-2" style="background-color: #888888;">


    <?php
        if($_SESSION['role'] == 'etudiant')
        {
            echo ' <h4>Filtres</h4> ';

        }elseif($_SESSION['role'] == 'admin')
        {
            echo ' <h4>Liste des salles</h4> ';
        }
    ?>
</div>