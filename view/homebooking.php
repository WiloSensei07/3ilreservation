<h3 class="text-center">Liste des salles de TP </h3>

<div class="row align-items-center" id="salle">
    <?php
        require_once '../controller/requettes.php';
        use backEndAccueil as requete;
        requete\listeSalle();

        /*$date =  json_encode($_POST['heure']);
       echo "la date est: ".$date;
       requete\listeSalleFiltre($date);*/

       /*if(isset($_G'datefilter']))
       {
           requete\listeSalleFiltre($_GET['datefilter']);
       }*/
    ?>
</div>
