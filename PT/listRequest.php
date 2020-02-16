<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $req = $_POST['requete'];
  $id = substr($req, 1);
  $query = mysqli_query($co, "UPDATE ami SET statut = $req[0] WHERE idUser = '$id' AND idUser2 = {$_SESSION['idUser']}");
}

$query = mysqli_query($co, "SELECT * FROM ami WHERE idUser2 = {$_SESSION['idUser']} AND statut = 0");
?>
<?php while ($donnees = $query->fetch_array()) {
$user = mysqli_query($co, "SELECT nom, prenom FROM utilisateur WHERE idUser = {$donnees['idUser']}")->fetch_array();
  ?>

  <form method="POST" action="">
    <p>Demande de <?php echo $user['prenom'], " ", $user['nom'] ?></p>
    <button type="submit" name="requete" value="1<?php echo $donnees['idUser'] ?>">Accepter</button>
    <button type="submit" name="requete" value="2<?php echo $donnees['idUser'] ?>">Refuser</button>
  </form>
<?php } ?>
