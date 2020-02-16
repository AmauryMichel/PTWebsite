<?php
if (isset($_GET['idProp'])){
  $idProp = $_GET['idProp'];
  $query = mysqli_query($co, "SELECT * FROM `proposition` WHERE idGroup = '$m1->currentGroup' AND idProp = '$idProp'");
  if ($query->num_rows == 0){
    header('Location: index.php');
  }
  $m1->setProp($_GET['idProp']);
}
else{
  header("Location: listProp.php");
}
?>
