<?php

    require_once '../controller/requettes.php';
    use backEndAccueil as requete;

    $filterDate = $_GET['filterDate'];
    $_SESSION['date-filter'] = $filterDate;

    listeSalleFiltreDate($filterDate);

    function listeSalleFiltreDate($date)
    {
        require'connect.php';
        $req1 = $dbh->prepare('SELECT * FROM horaire WHERE date = ?');
        $req1->execute(array($date));
        while($horaire = $req1->fetch())
        {
            $req2 = $dbh->prepare('SELECT * FROM salles WHERE id = ?');
            $req2->execute(array($horaire['id']));
            while($salle = $req2->fetch())
            {
                requete\afficheSalle($salle);
            }
        }
    }
