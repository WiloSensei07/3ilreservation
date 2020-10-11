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
                if($salle['nb_place'] == 1)
                {
                    $message = 'place disponible';
                    $color = '#209708';
                    $bouton = 'enabled';
                }elseif($salle['nb_place'] > 1)
                {
                    $message = 'places disponibles';
                    $color = '#209708';
                    $bouton = 'enabled';
                }elseif($salle['nb_place'] == 0)
                {
                    $message = 'place disponible';
                    $color = 'red';
                    $bouton = 'disabled';
                }
                echo '
                    <div class="col" style="padding-bottom: 15px;">
                        <div class="card" style="width: 18rem; border-radius: 20px; border-color: '.$color.';">
                            <img class="card-img-top" src="../img/salle1.jpg" alt="Card image cap" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">'.$salle['numero'].'</h5>
                                <p class="card-text" style="color: '.$color.';">'.$salle['nb_place'].' '.$message.'</p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" '.$bouton.'>Reserver</button>
                            </div>
                        </div>
                    </div>
                ';
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
                      <div class="modal-body">
                        <p>Date: 10-10-2020</p>
                        <p>De: 08h30</p>
                        <p>A: 10h00</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary">Confirmer</button>
                      </div>
                    </div>
                  </div>
                </div>
            
            
            ';
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
    }

?>
