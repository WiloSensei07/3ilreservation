<?php
    session_start();

if(empty($_SESSION['key']))
    $_SESSION['key'] = bin2hex(random_bytes(32));

$csrf = hash_hmac('sha256', 'this is some string: logins.php', $_SESSION['key']);

$_SESSION['jeton']=$csrf;


    if($_SESSION['login'] == true)
    {
        header('location: ../view/index2.php');
    }



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../stylesheet/login.css">
        <title>3IL: Connexion</title>
    </head>
    <body>
        <section class="login-page">
            <form action="../controller/loginphp.php" method="post">
                <div class="box">
                    <div class="form-head">
                        <h2> Member Login</h2>
                    </div>
                    <div class="form-body">
                        <input type="text" name="email" id="" placeholder="User name" required>
                        <input type="password" name="password" id="" placeholder="Password" required>
                        <input type="hidden" name="csrf" value="<?php echo $csrf ?>">
                    </div>
                    <div class="form-footer">
                        <button type="submit" name="connexion">Sign In</button>
                    </div>
                    <a href="pseudo.php" style="color: white; "> Connexion par code </a>
                </div>
            </form>
        </section>
    </body>
</html>