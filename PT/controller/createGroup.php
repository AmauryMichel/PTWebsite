<?php
include '../model/member.php';
include '../check/checkPost.php';
include '../check/checkConnected.php';

$groupName = $_POST['groupName'];
$query = mysqli_query($co, "SELECT * FROM `group` WHERE groupName = '$groupName'");
if ($query->num_rows == 0) {
    $query = mysqli_query($co, "INSERT INTO `group` (idAdmin, groupName) VALUES ('$m1->id', '$groupName')");
    $query2 = mysqli_query($co, "INSERT INTO `groupMember` (idGroup, idUser) VALUES ($co->insert_id, '$m1->id')");
}

$myfile = fopen("../log.txt", "a") or die("Unable to open file!");
$txt = ": Group " . $groupName . " created by user n°" . $m1->id . "\n";
fwrite($myfile, date('l jS \of F Y h:i:s A') . $txt);
fclose($myfile);

header("Location: ../index.php");

?>
