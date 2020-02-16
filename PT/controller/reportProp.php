<?php
include '../model/member.php';
include '../check/checkPost.php';
include '../check/checkConnected.php';

$idProp = $_POST['report'];

$query = mysqli_query($co, "INSERT INTO `reportProp` (idProp, idUser) VALUES ('$idProp', '$m1->id')");
if ($query === null){
  echo "Erreur lors de l'insertion";
}
else{
  header("Location: ../listProp.php");
}
?>
