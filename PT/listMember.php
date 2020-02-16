<?php
include 'header.php';
include 'check/checkConnected.php';
include 'check/checkGroup.php';
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Liste des membres</title>
</head>
<body>
<h1 class="text-center">Membres du groupe</h1>
<?php
$query = mysqli_query($co, "SELECT * FROM `detailsMember` WHERE idGroup = '$m1->currentGroup' ORDER BY name");
while ($donnees = $query->fetch_array()) { ?>
    <div class="member mb-3 text-center" style="border-bottom: 1px solid black">
        <form method="POST" action="controller/removeMember.php">
            <input type='hidden' name='idUser' value='<?php echo $donnees['idUser'] ?>'/>
            <p><?php echo $donnees['name'], " ", $donnees['surname'] ?></p>
            <?php
            if (($m1->isAdminGroup || $m1->isAdminSite) && $donnees['idUser'] != $m1->id) {
                ?>
                <button class="mb-2" type="submit" name="kick" value="<?php echo $donnees['idUser'] ?>">Retirer du groupe</button>
                <?php
            }
            ?>
        </form>
    </div>
    <?php
}
?>
</body>
</html>
