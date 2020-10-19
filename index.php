<?php
    session_start();

    if(($_SESSION['id'] == null ))
    {
        header('location: view/index2.php');
    }else
    {
        header('location: view/login.php');
    }
?>