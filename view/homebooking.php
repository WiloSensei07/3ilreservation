<h3 class="text-center">Liste des salles de TP </h3>

<div class="row align-items-center">
    <?php
        require_once '../controller/requettes.php';
        use backEndAccueil as requete;
        requete\listeSalle();
    ?>
</div>




<?php

    /*for( $i=0; $i<2; $i++)
    {
        echo '
            <div class="col-lg-10 col-sm-12 ">
                <div class="col-xs-11 col-md-12 row ">
                    <div class="col-xs-3 col-sm-4 col-md-3">
                        <div class="row">
                            <div class="col-12 col-sm-10 offset-sm-1 long my-2 mt-3 ">
                                <div class="card text-center">
                                <img class="card-img-top" src="../img/salle1.jpg" alt="Card image cap" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                                    
                                    <hr class="md-4">
                                    <div class="card-body"style="color:black;">
                                    <a href="#"> 202 </a>
                                        <h5 class ="card-title" style="font-weight:bold;">Nom du plat</h5>
                                        <p class="card-text">  dsqqsdq </p></br>
                                        <a class="btn btn-outline-secondary" href="#" >    VOIR  </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }*/
?>
