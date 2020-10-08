
<div class="col-lg-10" style="background-color: white;">
    <?php
        if($_SESSION['role'] == 'etudiant')
        {
            require_once('homebooking.php');

        }elseif($_SESSION['role'] == 'admin')
        {
            require_once('homeadmin.php');
        }
    ?>
</div>