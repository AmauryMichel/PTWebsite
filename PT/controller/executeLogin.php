<?php
include '../check/checkPost.php';
include '../model/member.php';
$db = new db("bd_pt");
$co = $db->tryConnect();

$mail = mysqli_real_escape_string($co, strip_tags($_POST['mail']));
$query = mysqli_query($co, "SELECT idUser, pass, isAdminSite FROM `user` WHERE mail = '$mail'");
if ($query->num_rows != 0){
  $data = $query->fetch_array();
  if(password_verify($_POST['pass'], $data['pass'])){
    $m1 = new member($db, $data['idUser']);
    $m1->login($data['isAdminSite']);
    header("Location: ../profile.php?idUser=".$m1->id);
  }
  else{
    setcookie("errorLogin", 1, time() + 5, "/");
    header("Location: ../login.php");
  }
}
else{
  setcookie("errorLogin", 1, time() + 5, "/");
  header("Location: ../login.php");
}
