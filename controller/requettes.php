<?php

    
    namespace  backEndAccueil
    {

        function listeSalle()
        {
            require'connect.php';
            $requette = $dbh->prepare('SELECT * FROM salles');
            $requette->execute();
            while($salle = $requette->fetch())
            {
               afficheSalle($salle);
            }
        }


        function filterHoursOption()
        {
            require'connect.php';
            $requette = $dbh->prepare('SELECT * FROM creneau');
            $requette->execute();
            while($creneau = $requette->fetch())
            {
                echo ' <option value="'.$creneau['id'].'">'.$creneau['heure_d'].'-'.$creneau['heure_f'].'</option>  ';
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
                $blur = 0;
            }
            echo '
                    <div class="col" style="padding-bottom: 15px; filter: blur('.$blur.'px);">
                        <div class="card" style="width: 18rem; border-radius: 20px; border-color: '.$color.';">
                            <img class="card-img-top" src="../img/salle1.jpg" alt="Card image cap" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">'.$salle['numero'].'</h5>
                                <p class="card-text" style="color: '.$color.';">'.$salle['nb_place'].' '.$message.'</p>
                                <input type="hidden" id="idHoraire" value="">
                                <input type="hidden" id="idCreneau" value="">
                                <button type="button" class="btn btn-primary" id="'.$salle['id'].'" data-toggle="modal" 
                                    data-target="#exampleModalCenter" '.$bouton.' onclick="idSalle(this.id)"> Reserver
                                </button>
                            </div>
                        </div>
                    </div>
                ';


            if(!empty($_SESSION['date-filter']))
            {
                $dateReservation = $_SESSION['date-filter'];
            }else
            {
                $dateReservation = 'Date non choisie';
                $creneauReservation = 'Pas de créneau a la datechoisie';
            }

            if(!empty($_SESSION['creneau-filter']))
            {
                $creneauReservation = $_SESSION['creneau-filter'];
            }else
            {
                $creneauReservation = 'Creneau vide: select option a venir';
            }



            echo '
            
                <!-- Button trigger modal -->
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmer votre reservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      
            <form id="" action="confirmReservation.php" method="post">
                      <div class="modal-body" >
                        <input type="text" name="dateVal" id="dateVal" value="d'.$dateReservation.'">
                        <input type="text" name="idCreneau" id="idCreneau" value="id c">
                        <input type="text" name="idUtilisateur" id="idUtilisateur" value="id u">
                        <input type="text" name="idHoraire" id="idHoraire" value="id h'.$_SESSION['idHoraire'].'">
                        <p>Date : '.$dateReservation.'</p>
                        <p>Heure : '.$creneauReservation.'</p>
                            <!-- <div class="form-group row">
                                <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                <div class="col-10">
                                    <p></p>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Heure</label>
                                <div class="col-10">
                                    <select class="form-control" id="creneau" >
                                        <option value="" selected>Choix du créneau</option>
                                        <option value="1" >08h-10h00</option>
                                        <option value="2" >10h30-12h00</option>
                                        <option value="3" >13h30-15h00</option>
                                        <option value="4" >15h1516h45</option>
                                    </select>
                                </div>
                            </div> -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="Submit" class="btn btn-primary">Confirmer</button>
                      </div>
                      
            </form>
                    </div>
                  </div>
                </div>
            
            
            ';
        }

        function filterCreneauOption($date)
        {
            require'connect.php';
            $requette = $dbh->prepare('SELECT * FROM horaire WHERE date = ?');
            $requette->execute(array($date));
            $creneau1 = 0;
            $creneau2 = 0;
            $creneau3 = 0;
            $creneau4 = 0;
            while($horaire = $requette->fetch())
            {
                if($horaire['creneau1'] == 1)
                {
                    $creneau1 = 1;
                }else if($horaire['creneau1'] == 0)
                {
                    $creneau1 = 0;
                }

                if($horaire['creneau2'] == 1)
                {
                    $creneau2 = 2;
                }else if($horaire['creneau2'] == 0)
                {
                    $creneau2 = 0;
                }

                if($horaire['creneau3'] == 1)
                {
                    $creneau3 = 3;
                }else if($horaire['creneau3'] == 0)
                {
                    $creneau3 = 0;
                }

                if($horaire['creneau4'] == 1)
                {
                    $creneau4 = 4;
                }else if($horaire['creneau4'] == 0)
                {
                    $creneau4 = 0;
                }
            }

            if($creneau1 == 1)
            {
                ajouterCreneau($creneau1);
            }
            if($creneau2 == 2)
            {
                ajouterCreneau($creneau2);
            }
            if($creneau3 == 3)
            {
                ajouterCreneau($creneau3);
            }
            if($creneau4 == 4)
            {
                ajouterCreneau($creneau4);
            }

        }

        function ajouterCreneau($idCreneau)
        {
            require'connect.php';
            $requette = $dbh->prepare('SELECT * FROM creneau WHERE id = ?');
            $requette->execute(array($idCreneau));
            while($creneau = $requette->fetch())
            {
                echo ' <option value="'.$creneau['id'].'">'.$creneau['heure_d'].'-'.$creneau['heure_f'].'</option>  ';
            }
        }

    }

?>
