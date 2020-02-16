<?php
include '../model/member.php';
include '../check/checkConnected.php';
include '../check/setProp.php';

$text = mysqli_real_escape_string($co, $_POST['text']);
$query = mysqli_query($co, "INSERT INTO comment (idProp, idUser, text) VALUES ('$m1->currentProp', '$m1->id', '$text')");
if ($query === false){
  echo "Erreur lors de l'insertion";
  }
else {
  $myfile = fopen("../log.txt", "a") or die("Unable to open file!");
  $txt = ": Comment" . " created by user n°" . $m1->id . " on proposition n°" . $m1->currentProp . "\n";
  fwrite($myfile, date('l jS \of F Y h:i:s A') . $txt);
  fclose($myfile);
  header('Location: ../detailsProp.php?idProp=' . $m1->currentProp);
}
?>
