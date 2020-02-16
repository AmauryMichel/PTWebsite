<?php
class db{
  private $host;
  private $user;
  private $bdd;
  private $passwd;
  private $co;

  //Initialise les paramètres pour se connecter à la base de données avec le nom passé en paramètre
  function __construct($bdd){
    $this->host = "localhost"; // ou 127.0.0.1
    $this->user = "root";
    $this->passwd = "";
    $this->bdd = $bdd; // le nom de votre base de données
  }

  //Retourne une connexion à la base de données
  public function tryConnect(){
    try {
      $this->co = mysqli_connect($this->host, $this->user, $this->passwd, $this->bdd) or die("erreur de connexion");
      mysqli_set_charset($this->co, "utf8");
      return $this->co;
    } catch (mysqli_sql_exception $e) {
      $e->getMessage();
      echo $e;
    }
  }

  //Ferme la connexion à la base de données
  public function tryClose(){
    try {
      mysqli_close($this->co);
    } catch (mysqli_sql_exception $e) {
      $e->getMessage();
      echo $e;
    }
  }
}

?>
