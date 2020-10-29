<br>
<h3 class="text-center" style="color: #1d1c1c">Liste des salles de TP </h3><br>

<div class="row align-items-center" id="salle">
    <?php
        require_once '../controller/requettes.php';
        use backEndAccueil as requete;
        requete\listeSalle();
    ?>
</div>

<script>
    function idSalle(id)
    {
        let idsalle = document.getElementById('idUtilisateur').value = id;
        //console.log('id salle a reserver '+idsalle);
        //document.getElementById('date-confirm').innerHTML = date ;
    }
</script>

<script src="../stylesheet/confirmReservation.js"></script>
