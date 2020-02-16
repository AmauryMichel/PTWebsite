<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="main-text col-6 text-right mt-4 py-4">
            <img src="IMG_20190218_101933.jpg" alt="">
        </div>
        <div class="main-form col-6 mt-5">
            <h1>Inscription</h1>

            <form method="post" action="controller/createAccount.php" class="inscription">
                <input type="text" name="mail" required placeholder="Adresse email"><br>
                <input type="text" name="surname" required placeholder="Prénom"><br>
                <input type="text" name="name" required placeholder="Nom"><br>
                <input type="password" name="mdp" required placeholder="Mot de passe"><br>
                <input type="password" name="confirm" required placeholder="Confirmer le mot de passe"><br>
                <input type="submit" name="submit" value="S'inscrire"/>
            </form>
        </div>
    </div>
</body>
</html>
