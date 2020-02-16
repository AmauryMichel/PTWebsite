<?php
include '../model/member.php';
include '../check/checkPost.php';
include '../check/checkConnected.php';

$vote = $_POST['vote'];
$idProp = $_POST['idProp'];

$query = mysqli_query($co, "INSERT INTO `vote` (idProp, idUser, isFor) VALUES ('$idProp', '$m1->id', '$vote')");
if ($query === null){
  echo "Erreur lors de l'insertion";
}
else{
  $myfile = fopen("../log.txt", "a") or die("Unable to open file!");
  $txt = ": User n°" . $m1->id . " voted on proposition n°" . $idProp . "\n";
  fwrite($myfile, date('l jS \of F Y h:i:s A') . $txt);
  fclose($myfile);
  header('Location: ../index.php');
  header("Location: ../listProp.php");
}
?>
