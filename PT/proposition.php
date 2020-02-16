<?php
include 'model/member.php';
include 'check/checkConnected.php';
include 'check/checkGroup.php';
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <title>Créer une proposition</title>
</head>
<body>

  <h1>Créer une proposition pour le groupe n°<?php echo $m1->currentGroup ?></h1>

  <form method="post" action="controller/createProp.php">
    <label for="propName">Nom de la proposition</label> <input type="text" name="propName" required><br>
    <label for="descr">Description</label> <input type="text" name="descr"><br>
    <?php
    $query = mysqli_query($co, "SELECT * FROM category WHERE idGroup = '$m1->currentGroup'");
    ?>
    <select onchange="val()" id="category" name="category" required>
      <option value=""></option>
      <?php while ($donnees = $query->fetch_array()) { ?>
        <option value="<?php echo $donnees['idCat'] ?>"><?php echo $donnees['catName'] ?></option>
      <?php } ?>
    </select>
    <select id="category2" name="category2">
    </select><br>
    <label for="date">Description</label> <input type="date" name="date"><br>
    <button type="submit">Créer la proposition</button>
  </form>
</body>
</html>

<script>
function val() {
  $('#category2').empty();
  $('#category option').clone().appendTo('#category2');
  var selected = document.getElementById("category").value;
  $('#category2 option[value="' + selected +'"]').remove();
}
</script>
