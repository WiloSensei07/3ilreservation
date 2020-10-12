
<div class="col-lg-2" style="background-color: #323131; color: white">
    <br>
    <?php
        if($_SESSION['role'] == 'etudiant')
        {
            echo ' <h4 class="text-center">Filtres</h4> ';

        }elseif($_SESSION['role'] == 'admin')
        {
            echo ' <h4 class="text-center">Liste des salles</h4> ';
        }
    ?>
    <br>
    <div class="form-group row">
        <label for="example-date-input" class="col-2 col-form-label">Date</label>
        <div class="col-10">
            <input class="form-control" type="date" id="example-date-input" onchange="pickHours()">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-2 col-form-label">Heure</label>
        <div class="col-10">
            <select class="form-control">
                <option selected>Choix du créneau</option>
                <?php
                    require_once '../controller/requettes.php';
                    use backEndAccueil as requete;
                    requete\filterHoursOption();
                ?>
            </select>
        </div>
    </div>

    <br>

</div>

<script>
    function pickHours()
    {
        let heure = document.getElementById('example-date-input').value();
        alert(heure);
    }
</script>