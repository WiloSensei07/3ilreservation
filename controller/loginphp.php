<?php
    session_start();
    $_SESSION['login'] = false;

    // Mise en place du Token CSRF
    // 1) create a key for hash_hmac function
    //if(empty($_SESSION['key']))
    //{
      //  $_SESSION['key'] = bin2hex(random_bytes(32));
    //}

    // create token CSRF
    //$csrf = hash_hmac('sha256', 'this is some string: login.php', $_SESSION['key']);

    // Validate token

    if( isset($_POST['connexion']) ) {
        if(hash_equals($_SESSION['jeton'], $_POST['csrf']))
        {
            require_once ('connect.php');
            $login = $_POST['email'];
            $password = $_POST['password'];
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
        }else
        {
            echo 'CSRF Token failed ';
        }


    }

    if(isset($_POST['deconnexion']))
    {
        $_SESSION['login'] = false;
        $dbh = NULL;
        unset($_SESSION['idUtilisateur']);
        unset($_SESSION['role']);
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