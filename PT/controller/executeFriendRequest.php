<?php
include '../model/member.php';
include '../check/checkPost.php';
include '../check/checkConnected.php';

$req = $_POST['requete'];
$id = substr($req, 1);
$query = mysqli_query($co, "UPDATE friend SET status = $req[0] WHERE idUser = '$id' AND idUser2 = '$m1->id'");

if ($query === null){
    echo "Erreur lors de l'insertion";
}
else{
    header("Location: ../profile.php?idUser=".$m1->id);
}
?>
