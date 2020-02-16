<?php
$query = mysqli_query($co, "SELECT * FROM groupMember WHERE idGroup='$m1->currentGroup' AND idUser='$m1->id'");
if ($query->num_rows == 0){
    header('Location: index.php');
}
?>
