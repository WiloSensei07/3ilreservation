<?php
    session_start();
    $_SESSION['login'] = false;

    require_once ('connect.php');

    $login = $_POST['email'];
    $password = $_POST['password'];

    if( isset($_POST['connexion']) ) {
        // hash_password($dbh);
        $req = $dbh->prepare( 'SELECT * FROM utilisateur WHERE login = ? ' );
        $req->execute( array( $login ) );
        $utilisateur = $req->fetch();

        if(empty($utilisateur))
        {
            echo "nom d'utilisateur incorrect ";
        }else if( password_verify( $password, $utilisateur['password'] ) )
        {
            $_SESSION['idUtilisateur'] = $utilisateur['id'];
            $_SESSION['role'] = $utilisateur['role'];
            $_SESSION['login'] = true;
            header('location: ../view/index2.php');
        }else
        {
            echo 'mot de passe incorrec';
        }
    }

    if(isset($_POST['deconnexion']))
    {
        $_SESSION['login'] = false;
        $dbh = NULL;
        unset($_SESSION);
        session_destroy();
        header('location: ../index.php');
    }


    function hash_password($dbh)
    {
        $req = $dbh->prepare('SELECT * FROM utilisateur');
        $req->execute();

        while($result = $req->fetch())
        {
            $pass = password_hash($result['password'], PASSWORD_DEFAULT);

            $req2 = $dbh->prepare('UPDATE utilisateur SET password = ? WHERE id = ?');
            $req2->execute(array($pass, $result['id']));

            print_r($pass."-----".$result['id']);
            echo "</br></br>"."requette Okay      ";
        }
    }
?>