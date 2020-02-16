<?php
include '../model/member.php';
include '../check/checkPost.php';
include '../check/checkConnected.php';

$fav = ($_POST['fav'] + 1) % 2;
$query = mysqli_query($co, "UPDATE `groupMember` SET favorite = '$fav' WHERE idUser = '$m1->id' AND idGroup = '$m1->currentGroup'");

header("Location: ../detailsGroup.php?idGroup=" . $m1->currentGroup);

?>