<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style_login.css?v=<?php filemtime("css/style_login.css") ?>">
</head>
<body>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="main-text col-6 text-right mt-4 py-4">
            <img src="IMG_20190218_101933.jpg" alt="">
        </div>
        <div class="main-form col-6 mt-5">
            <h1>Connexion</h1>
            <form method="post" action="controller/executeLogin.php">
                <input type="text" name="mail" placeholder="Mail"><br>
                <input type="password" name="pass" placeholder="Mot de passe"><br>
                <input type="submit" name="submit" value="Se connecter"><br>
            </form>

            <div>
                <a class="underlineHover" href="#">Mot de passe oublié?</a>
            </div>
            <?php
            if (isset($_COOKIE['errorLogin'])) {
                echo '<span style="color:red">Erreur lors de la connexion</span>';
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
