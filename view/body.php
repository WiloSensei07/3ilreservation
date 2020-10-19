
<div class="col-lg-10 background">
    <div class="box">
        <?php
        if($_SESSION['role'] == 'etudiant')
        {
            require_once('homebooking.php');

        }elseif($_SESSION['role'] == 'admin')
        {
            require_once('homeadmin.php');
        }else
        {
            echo 'paul';
        }
        ?>
    </div>
</div>