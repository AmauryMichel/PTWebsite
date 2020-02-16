<?php
include '../model/member.php';
include '../check/checkPost.php';
include '../check/checkConnected.php';

$idComment = $_POST['report'];

$query = mysqli_query($co, "INSERT INTO `reportComment` (idComment, idUser) VALUES ('$idComment', '$m1->id')");
if ($query === null){
  echo "Erreur lors de l'insertion";
}
else{
  header("Location: ../detailsProp.php?idProp=".$m1->currentProp);
}
?>
