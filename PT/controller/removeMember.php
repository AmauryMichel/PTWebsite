<?php
include '../model/member.php';
include '../check/checkPost.php';
include '../check/checkConnected.php';

$idUser = $_POST['idUser'];
$query = mysqli_query($co, "DELETE FROM `groupMember` WHERE idUser = '$idUser' AND idGroup = '$m1->currentGroup'");
if ($query === false):
  echo "Erreur lors de la suppression";
else:
  header('Location: ../listMember.php');
endif;
?>
