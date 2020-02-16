<?php
if (!isset($_GET['idGroup'])) {
    header("Location: index.php");
}
$m1->setGroup($_GET['idGroup']);

$query = mysqli_query($co, "SELECT * FROM `group` WHERE idGroup = '$m1->currentGroup' AND idAdmin = '$m1->id'");
$m1->setAdminGroup($query->num_rows);
?>
