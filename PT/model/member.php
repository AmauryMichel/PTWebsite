<?php
include 'db.php';
session_start();

class member{
  var $db;
  var $id;
  var $mdp;
  var $mail;

  //Le groupe/proposition que l'utilisateur est actuellement en train de regarder
  var $currentGroup;
  var $currentProp;

  //Variable qui indique si l'utilisateur est un membre du site/groupe
  var $isAdminSite;
  var $isAdminGroup;

  //Crée l'utilisateur différemment en fonction du nombre de paramètres
  function __construct(){
    $nbArgs = func_num_args();
    $args = func_get_args();

    switch ($nbArgs) {
      //S'il y a 2 paramètres, crée uniquement l'objet
      case '2':
      $this->db= $args[0];
      $this->id = $args[1];
      break;

      //S'il y a 5 paramètres, crée l'objet et l'ajoute dans la base de données
      case '5':
      $this->db = $args[0];
      $mail = $args[1];
      $pass = $args[2];
      $surname = $args[3];
      $name = $args[4];
      $query = mysqli_query($this->db->tryConnect(), "INSERT INTO `user` (mail, pass, surname, name) VALUES ('$mail', '$pass', '$surname', '$name')");
      if($query === false){
        echo "Problème lors de l'insertion";
      }
      //Récupère le dernier id inséré dans la base de données et le stock dans cet objet
      $this->id = $this->db->tryConnect()->insert_id;
      break;
    }
  }

  public function changePass($newMdp){
    $this->mdp = $newMdp;
    $query = mysqli_query($this->db->tryConnect(), "UPDATE `membre` SET pass = '$newMdp' WHERE idUser = '$this->id'");
  }

  public function login($bool){
    $this->isAdminSite = $bool;
    $_SESSION['member'] = $this;
  }

  //Change l'id du groupe que l'utilisateur est en train de regarder
  public function setGroup($currentGroup){
    $this->currentGroup = $currentGroup;
    $_SESSION['member'] = $this;
  }

  //Change l'id de la proposition que l'utilisateur est en train de regarder
  public function setProp($currentProp){
    $this->currentProp = $currentProp;
    $_SESSION['member'] = $this;
  }

  public function setAdminGroup($bool){
    $this->isAdminGroup = $bool;
    $_SESSION['member'] = $this;
  }

  public function logout(){
    $this->db->tryClose();
    session_unset();
  }
}


?>
