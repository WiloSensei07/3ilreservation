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
    function idSalle(idSalle)
    {
        document.getElementById('idSalle').value = idSalle;

        /*var txt;
        if (confirm("Press a button!")) {
            txt = "You pressed OK !";
        } else {
            txt = "You pressed Cancel!";
        }
        document.getElementById("demo").innerHTML = txt;*/

    }
</script>

<script src="../js/confirmReservation.js"></script>
