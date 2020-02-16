<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<div class="text-center mt-5">
    <h1 class="my-4">Création de groupe</h1>
    <form method="post" action="controller/createGroup.php">
        <label for="nom">Libellé du groupe</label>
        <input id="nom" type="text" name="groupName" required><br>
        <input class="my-4" type="submit" name="submit" value="Créer le groupe"/>
    </form>
</div>
</body>
</html>
