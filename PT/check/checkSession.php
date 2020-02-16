<?php
//Si l'utilisateur est connecté, stock l'objet member gardé dans la session sinon crée une nouvelle connexion à la base de données
//Cela permet d'éviter de créer plusieurs connexions
if (isset($_SESSION['member'])){
  $m1 = $_SESSION['member'];
  $co = $m1->db->tryConnect();
}
else {
  $db = new db('bd_pt');
  $co = $db->tryConnect();
}
?>
