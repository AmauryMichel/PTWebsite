<?php
include '../model/member.php';
include '../check/checkConnected.php';

$idInvited = $_POST['users'];
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = '';

for ($i = 0; $i < 10; $i++) {
  $index = rand(0, strlen($characters) - 1);
  $randomString .= $characters[$index];
}

$query = mysqli_query($co, "INSERT INTO invitation (idGroup, idUser, link) VALUES ('$m1->currentGroup', '$idInvited', '$randomString')");
if ($query === false){
  echo "Erreur lors de l'insertion";
}
else{
  $myfile = fopen("../log.txt", "a") or die("Unable to open file!");
  $txt = ": User n°" . $idInvited ." was invited to the group n°" . $m1->currentGroup . " by user n°" . $m1->id . "\n";
  fwrite($myfile, date('l jS \of F Y h:i:s A') . $txt );
  fclose($myfile);
  header("Location: ../detailsGroup.php?idGroup=".$m1->currentGroup);
}
?>
