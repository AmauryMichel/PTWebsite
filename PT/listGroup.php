<?php
include 'model/member.php';
include 'check/checkConnected.php';

$query = mysqli_query($co, "SELECT * FROM `detailsMember` WHERE idUser = '$m1->id'");
while ($donnees = $query->fetch_array()) { ?>
  <p>Groupe n°<?php echo $donnees['idGroup'] ?> : <?php echo $donnees['groupName'] ?></p>
  <form method="POST" action="category.php">
    <button type="submit" name="idGroup" value="<?php echo $donnees['idGroup'] ?>">Créer une catégorie pour le groupe</button>
  </form>
  <form method="POST" action="proposition.php">
    <button type="submit" name="idGroup" value="<?php echo $donnees['idGroup'] ?>">Créer une proposition pour le groupe</button>
  </form>
  <form method="POST" action="listProp.php">
    <button type="submit" name="idGroup" value="<?php echo $donnees['idGroup'] ?>">Voir les propositions du groupe</button>
  </form>
  <form method="POST" action="invite.php">
    <button type="submit" name="idGroup" value="<?php echo $donnees['idGroup'] ?>">Inviter un membre dans le groupe</button>
  </form>
  <form method="POST" action="listMember.php">
    <button type="submit" name="idGroup" value="<?php echo $donnees['idGroup'] ?>">Voir les membre du groupe</button>
  </form>
  <form method="POST" action="controller/deleteGroup.php">
    <button type="submit" name="idGroup" value="<?php echo $donnees['idGroup'] ?>">Supprimer le groupe</button>
  </form>
  <?php
}
?>
<br>
<form method="" action="group.php">
  <input type="submit" name="submit" value="Créer un groupe">
</form>
