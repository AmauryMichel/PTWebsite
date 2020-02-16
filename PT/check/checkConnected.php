<?php
//Si l'utilisateur est connecté, stock l'objet member gardé dans la session sinon redirige vers l'index
if (isset($_SESSION['member'])){
  $m1 = $_SESSION['member'];
  $co = $m1->db->tryConnect();
}
else {
  header("Location: index.php");
}
?>
