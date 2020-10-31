<?php

    $date = $_GET['dateReservation'];
    $idutilisateur = $_GET['idUtilisateur'];
    $idsalle = $_GET['idSalle'];
    $creneauf = $_GET['creneauf'];
    $newNbplace = $_GET['nbplace'];

    confirmationReservation($idutilisateur, $idsalle, $date, $creneauf,$newNbplace, $newNbplace);

    function verification($idutilisateur, $idsalle, $date, $creneau)
    {
        require 'connect.php';
        $req = $dbh->prepare('SELECT * FROM reservation WHERE idutilisateur = ? AND idsalle = ? AND date = ? AND creneau = ?');
        $req->execute(array($idutilisateur, $idsalle, $date, $creneau));
        $reservation = $req->fetch();
        if(empty($reservation))
        {
            confirmationReservation($idutilisateur, $idsalle, $date, $creneau);
            echo('<span style="color: green;">Salle reservé avec succès</span>');
        }else
        {
            echo('<span style="color: red;">Créneau déja reservé</span>');
        }

    }

    function confirmationReservation($idutilisateur, $idsalle, $date, $creneau, $newNbplace)
    {
        // Ajout d'une reservation en base de données
        require 'connect.php';
        $req = $dbh->prepare('INSERT INTO reservation (idutilisateur, idsalle, date, creneau) VALUES(:idutilisateur, :idsalle, :date, :creneau)');
        $req->execute(array(
            'idutilisateur' => $idutilisateur,
            'idsalle' => $idsalle,
            'date' => $date,
            'creneau' => $creneau
        ));
        updateSalle($idsalle, $newNbplace);
        echo('<span style="color: green;">Salle reservé avec succès</span>');
       // header('location: ../view/homebooking.php');
    }

    function updateSalle($idsalle, $newNbplace)
    {
        require 'connect.php';
        $req2 = $dbh->prepare('UPDATE salle SET nbplace = ? WHERE id = ?');
        $req2->execute(array($newNbplace, $idsalle));
    }