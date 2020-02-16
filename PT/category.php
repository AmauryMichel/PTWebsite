<?php
include 'model/member.php';
include 'check/checkConnected.php';
include 'check/checkGroup.php';
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Créer une catégorie</title>
</head>
<body>

  <h1>Créer une catégorie</h1>

  <form method="post" action="controller/createCat.php">
    <label for="catName">Nom de la catégorie</label> <input type="text" name="catName" required><br>
    <button type="submit">Créer la catégorie</button>
  </form>
</body>
</html>
