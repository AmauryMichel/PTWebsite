<?php
include '../model/member.php';
include '../check/checkPost.php';
include '../check/checkConnected.php';
include '../check/checkAdmin.php';

$idUser = $_POST['user'];

$query = mysqli_query($co, "UPDATE `group` SET idAdmin = '$idUser' WHERE idGroup = '$m1->currentGroup'");
$m1->setAdminGroup(0);
if ($query === null){
    echo "Erreur lors de l'insertion";
}
else{
    header("Location: ../detailsGroup.php?idGroup=".$m1->currentGroup);
}
?>
