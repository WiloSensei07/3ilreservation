<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../stylesheet/login.css">
        <title>Document</title>
    </head>
    <body>
        <section class="login-page">
            <form action="../controller/loginphp.php" method="post">
                <div class="box">
                    <div class="form-head">
                        <h2> Member Login</h2>
                    </div>
                    <div class="form-body">
                        <input type="text" name="email" id="" placeholder="Enter name" required>
                        <input type="password" name="password" id="" placeholder="Password" required>
                    </div>
                    <div class="form-footer">
                        <button type="submit" name="connexion">Sign In</button>
                    </div>
                </div>
            </form>
        </section>
    </body>
</html>