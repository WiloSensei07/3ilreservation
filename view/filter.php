
<div class="col-lg-2" style="background-color: #005067; color: white;">
    <br>
    <?php
        if($_SESSION['role'] == 'etudiant')
        {
            echo ' <h4 class="text-center">Filtres</h4> ';
            $_SESSION['date-filter'] = "";
            $_SESSION['creneau-filter'] = "";

        }elseif($_SESSION['role'] == 'admin')
        {
            echo ' <h4 class="text-center">Liste des salles</h4> ';
        }
    ?>
    <br>
    <div class="form-group row">
        <label for="example-date-input" class="col-2 col-form-label">Date</label>
        <div class="col-10">
            <input class="form-control" type="date" id="date-input" onchange="pickDate(this.value)">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-2 col-form-label">Heure</label>
        <div class="col-10">
            <select class="form-control" id="creneau" disabled onchange="pickHours(this.value)">
                <option value="" selected>Choix du créneau</option>
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

<script src="../js/filter.js"> </script>