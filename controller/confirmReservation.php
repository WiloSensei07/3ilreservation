<?php

    // Confirmation de la reservation

    //echo json_encode($_POST);

    $sucess = 0;
    $msg = "Une erreur est survenu (confirmReservation.php)";
    $data = [];

    if(!empty($_POST['dateVal']) AND !empty($_POST['creneauVal']) )
    {
        $dateVal = $_POST['dateVal'];
        $creneauVal = $_POST['creneauVal'];

        $idUtilisateur = '';
        $idHoraire = '';
        $idCreneau = '';

        // Ajout d'une reservation en base de données
        require_once 'connect.php';
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
        $msg = "Veuillez renseigner tous les champs";
    }

    // Envoie des données a notre fichier script
    $res = ["success" => $sucess, "msg" => $msg, "data" => $data];
    echo json_encode($res);