
<div class="col-lg-2" style="background-color: #888888;">
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
        <label class="col-2 col-form-label">Heure</label>
        <div class="col-10">
            <select class="form-control">
                <option>Choix du créneau</option>
                <option value="1">08h30-10h00</option>
                <option value="2">10h30-12h00</option>
                <option value="3">13h30-15h00</option>
                <option value="4">15h15-16h45</option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group row">
        <label for="example-date-input" class="col-2 col-form-label">Date</label>
        <div class="col-10">
            <input class="form-control" type="date" id="example-date-input">
        </div>
    </div>

    <br>

</div>