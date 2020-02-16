<?php
include '../model/member.php';
include '../check/checkPost.php';

$db = new db("bd_pt");
$co = $db->tryConnect();

$mdp_erreur = $email_erreur1 = $email_erreur2 = NULL;
$i = 0;

$mail = mysqli_real_escape_string($co, strip_tags($_POST['mail']));
$mdp = mysqli_real_escape_string($co, $_POST['mdp']);
$confirm = $_POST['confirm'];
$nom = $_POST['surname'];
$prenom = $_POST['name'];

$query = mysqli_query($co, "SELECT COUNT(*) AS nbr FROM user WHERE mail = '$mail'");
$donnees = $query->fetch_array();

if($donnees['nbr'] != 0){
  $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
  $i++;
}

if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)){
  $email_erreur2 = "Votre adresse mail n'a pas un format valide";
  $i++;
}

if ($mdp != $confirm){
  $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent";
  $i++;
}

if ($i==0):
  $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

  $m1 = new member($db, $mail, $mdp_hash, $nom, $prenom);
  header("Location: ../login.php");
else:
  ?>
  <h1>Inscription interrompue</h1>
  <p>Une ou plusieurs erreurs se sont produites pendant l'incription</p>
  <?php
  echo'<p>'.$i.' erreur(s)</p>';
  echo'<p>'.$mdp_erreur.'</p>';
  echo'<p>'.$email_erreur1.'</p>';
  echo'<p>'.$email_erreur2.'</p>';
  echo $mail;

  ?>
  <p>
    Cliquez <a href="../registration.php">ici</a> pour revenir à la page de d'inscription.<br><br>
    Cliquez <a href="../index.php">ici</a> pour revenir à la page d'accueil.
  </p>
  <?php
endif;
