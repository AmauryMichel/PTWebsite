<?php
include '../model/member.php';
include '../check/checkPost.php';
include '../check/checkConnected.php';

$query = mysqli_query($co, "DELETE FROM `group` WHERE idGroup = '$m1->currentGroup'");
if ($query === false){
  echo "Erreur lors de la suppression";
}
else{
  $myfile = fopen("../log.txt", "a") or die("Unable to open file!");
  $txt = ": Group n°" . $m1->currentGroup . " deleted by user n°" . $m1->id . "\n";
  fwrite($myfile, date('l jS \of F Y h:i:s A') . $txt);
  fclose($myfile);
  header('Location: ../index.php');
}
?>
