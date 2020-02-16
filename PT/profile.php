<?php
include 'header.php';

if (!isset($_GET['idUser'])) {
    header("Location: index.php");
} else {
    $idUser = $_GET['idUser'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = mysqli_query($co, "INSERT INTO friend (idUser, idUser2, status) VALUES ('$m1->id', '$idUser', 0)");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php
$query = mysqli_query($co, "SELECT * FROM user WHERE idUser = '$idUser'");
if ($query->num_rows == 1):
    $donnees = $query->fetch_array();
    ?>
    <p><?php echo $donnees['name'], " ", $donnees['surname'] ?></p>
    <p>Adresse email : <?php echo $donnees['mail'] ?></p>
    <?php
    if (isset($m1)):
        if ($m1->id == $idUser):
            ?>
            <a href="#">Modifier votre adresse mail</a>
            <a href="#">Modifier votre mot de passe</a>
        <?php
        else:
            $query2 = mysqli_query($co, "SELECT * FROM friend WHERE (idUser = '$idUser' AND idUser2 = '$m1->id') OR (idUser2 = '$idUser' AND idUser = '$m1->id')");
            if ($query2->num_rows == 0):
                ?>
                <form action="" method="post">
                    <button>Envoyer une requête d'amis</button>
                </form>
            <?php
            else:
                $donnees2 = $query2->fetch_array();
                if ($donnees2['status'] == 0):
                    ?>
                    <button>Requête envoyée</button><?php
                else:
                    ?>
                    <button>Vous êtes amis</button><?php
                endif;
            endif;
        endif;
    endif;
else:
    ?><p>Cet utilisateur n'existe pas</p><?php
endif; ?>

</body>
</html>
