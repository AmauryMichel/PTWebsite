<?php
include 'model/member.php';
include 'check/checkConnected.php';
include 'check/checkGroup.php';
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>

  <h1>Inviter un membre</h1>

  <form method="post" action="controller/createInvite.php">
    <?php
    $query = mysqli_query($co, "SELECT * FROM user WHERE idUser NOT IN (SELECT idUser FROM groupMember WHERE idGroup = '$m1->currentGroup') AND idUser NOT IN (SELECT idUser FROM invitation WHERE idGroup = '$m1->currentGroup')");
    ?>
    <select name="users" required>
      <option value=""></option>
      <?php while ($donnees = $query->fetch_array()) { ?>
        <option value="<?php echo $donnees['idUser'] ?>"><?php echo $donnees['name'], " ", $donnees['surname'] ?></option>
      <?php } ?>
    </select>
    <button type="submit">Inviter dans le groupe</button>
  </form>
</body>
</html>
