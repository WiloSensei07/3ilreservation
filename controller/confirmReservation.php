<?php

    // Confirmation de la reservation

    //echo json_encode($_POST);
    //require_once 'connect.php';

    echo 'paul';
/*
    $sucess = 0;
    $msg = "Une erreur est survenu (confirmReservation.php)";
    $data = [];

    if(!empty($_POST['dateVal']) AND !empty($_POST['idCreneau']) )
    {
        //$dateVal = $_POST['dateVal'];
        //$idCreneau = $_POST['creneauVal'];

        $idUtilisateur = $_SESSION['id'];
        $idHoraire = $_POST['idHoraire'];
        $idCreneau = $_POST['idCreneau'];

        // Ajout d'une reservation en base de données
        $req = $dbh->prepare('INSERT INTO reservation (idUtiliateur, idHoraire, idCreneau) VALUES(:idUtilisateur, :idHoraire, :idCreneau)');
        $req->execute(array(
            'idUtilisateur' => $idUtilisateur,
            'idHoraire' => $idHoraire,
            '$idCreneau' => $idCreneau
        ));

        $sucess = 1;
        $msg = "Votre salle a bien été reservé !!";

    }else
    {
        $msg = "Un probleme est survenu lors de la reservation";
    }
*/
    // Envoie des données a notre fichier script
    /*$res = ["success" => $sucess, "msg" => $msg, "data" => $data];
    echo json_encode($res);
    */