<?php

    /*var_dump($_GET);
    echo $_GET['envoi'];*/


    listeSalleFiltre($_GET['envoi']);


    function test()
    {

        //require'connect.php';

        $date =  json_encode($_GET['date']);
        echo $date;


        $data = [];
        $sucess = 1;
        $msg = "paul";
        /*
           $req1 = $dbh->prepare('SELECT * FROM horaire WHERE date = ?');
           $req1->execute(array($date));
           while($horaire = $req1->fetch())
           {
               $data[$horaire['id']] =  $horaire['idSalle'];
           }

           echo $date;
       */
        $res = ["success" => $sucess, "msg" => $msg, "data" => $data];
        echo json_encode($res);


        /*
            $sucess = 1;
            $msg = "paul";
            $data = [];
            require'connect.php';
            $req1 = $dbh->prepare('SELECT * FROM horaire WHERE date = ?');
            print_r($req1);
            $req1->execute(array($date));

            while($horaire = $req1->fetch())
            {
                $msg =  $horaire['idSalle'];
            }

            $res = ["success" => $sucess, "msg" => $msg, "data" => $data];
            echo json_encode($res);

        */

    }
    //listeSalleFiltre($date);

    function listeSalleFiltre($date)
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
                afficheSalle($salle);
            }

        }
    }


    function afficheSalle($salle)
    {
        if($salle['nb_place'] == 1)
        {
            $message = 'place disponible';
            $color = '#209708';
            $bouton = 'enabled';
            $blur = 0;
        }elseif($salle['nb_place'] > 1)
        {
            $message = 'places disponibles';
            $color = '#209708';
            $bouton = 'enabled';
            $blur = 0;
        }elseif($salle['nb_place'] == 0)
        {
            $message = 'place disponible';
            $color = 'red';
            $bouton = 'disabled';
            $blur = 1;
        }
        echo '
            <div class="col" style="padding-bottom: 15px; filter: blur('.$blur.'px);">
                <div class="card" style="width: 18rem; border-radius: 20px; border-color: '.$color.';">
                    <img class="card-img-top" src="../img/salle1.jpg" alt="Card image cap" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">'.$salle['numero'].'</h5>
                        <p class="card-text" style="color: '.$color.';">'.$salle['nb_place'].' '.$message.'</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" '.$bouton.'>Reserver</button>
                        <p id="date">paul</p>
                    </div>
                </div>
            </div>
        ';
    }
