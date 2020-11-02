<div class="col-lg-10 background">
    <div class="box">
        <br><h3 class="text-center" style="color: #1d1c1c;">Gestion de mes reservations </h3><br>

        <div class="row">
            <?php

                $idutilisateur = $_SESSION['idUtilisateur'];
                $tab = [];
                $i = 0;

                require_once '../controller/connect.php';
                $req = $dbh->prepare('SELECT * FROM reservation WHERE idutilisateur = ?');
                $req->execute(array($idutilisateur));
                while($reservation = $req->fetch())
                {
                    $dateReservation = $reservation['date'];
                    for($j=0; $j<count($tab); $j++)
                    {
                        if($dateReservation != $tab[$j])
                        {
                            echo '
                                <hr class="md-4">
                                <h4 style="color: #1d1c1c">'.$dateReservation.'</h4>
                            ';
                            $req2 = $dbh->prepare('SELECT * FROM reservation WHERE date = ?');
                            $req2->execute(array($dateReservation));
                            while($row = $req2->fetch())
                            {
                                $req3 = $dbh->prepare('SELECT * FROM salle WHERE id = ?');
                                $req3->execute(array($row['idsalle']));
                                $salle = $req3->fetch();
                                echo '
                                     <div class="col" style="padding-bottom: 15px;">
                                        <div class="card" style="width: 18rem; border-radius: 20px;  border: 2px solid green;">
                                            <img class="card-img-top" src="../img/salle1.jpg" alt="Card image cap" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">'.$salle['numero'].'</h5>
                                                <h6 class="card-title">'.$reservation['creneau'].'</h6>
                                                <p class="card-text" ></p>
                                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#exampleModalCenter" > Supprimer  </button>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        }
                    }
                    $tab[$i] = $dateReservation;
                    $i++;

                }
            ?>
        </div>
        
        <!--<div>
            <hr class="md-4">
            <h4 style="color: #1d1c1c">2020/11/01</h4>
            <div class="row">
                <?php
/*                for($i=0; $i<4; $i++)
                {
                    echo '
                        <div class="col" style="padding-bottom: 15px;">
                            <div class="card" style="width: 18rem; border-radius: 20px;  border: 2px solid green;">
                                <img class="card-img-top" src="../img/salle1.jpg" alt="Card image cap" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">111</h5>
                                    <h6 class="card-title">08h30-10h00</h6>
                                    <p class="card-text" ></p>
                                    <i class="fas fa-check" style="color: #0CA60C"></i>
                                </div>
                            </div>
                        </div> 
                    ';
                }
                */?>
            </div>
        </div>-->


    </div>
</div>