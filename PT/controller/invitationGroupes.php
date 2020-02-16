<?php
if (!isset($_GET['idU']) || !isset($_GET['idG']) || !isset($_GET['link']) || !isset($_GET['accept'])) {
    header('Location: ../index.php');
}

include '../model/member.php';
include '../check/checkConnected.php';

$idUser = $_GET['idU'];
$idGroup = $_GET['idG'];
$link = $_GET['link'];
$accept = $_GET['accept'];

$query = mysqli_query($co, "SELECT * FROM `invitation` WHERE idGroup = '$idGroup' AND idUser = '$idUser' AND link = '$link'");
if ($query->num_rows == 1) {
    if ($accept) {
        $query2 = mysqli_query($co, "INSERT INTO `groupMember` (idGroup, idUser) VALUES ('$idGroup', '$idUser')");
        $query3 = mysqli_query($co, "DELETE FROM `invitation` WHERE idGroup = '$idGroup' AND idUser = '$idUser'");

        $myfile = fopen("../log.txt", "a") or die("Unable to open file!");
        $txt = ": User n°" . $m1->id . " joined group n°" . $m1->currentGroup . "\n";
        fwrite($myfile, date('l jS \of F Y h:i:s A') . $txt);
        fclose($myfile);
        header('Location: ../index.php');
    } else {
        $query4 = mysqli_query($co, "DELETE FROM `invitation` WHERE idGroup = '$idGroup' AND idUser = '$idUser'");
    }
} else {
    header('Location: ../index.php');
}
?>