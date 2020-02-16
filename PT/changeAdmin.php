<?php
include 'model/member.php';
include 'check/checkConnected.php';
include 'check/checkAdmin.php';
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Changer l'administrateur du groupe</title>
</head>
<body>
<form method="post" action="controller/executeAdminChange.php">
    <?php
    $query = mysqli_query($co, "SELECT * FROM `detailsMember` WHERE idGroup = '$m1->currentGroup' AND idUser != '$m1->id' ORDER BY name");
    ?>
    <select name="user" required>
        <?php while ($donnees = $query->fetch_array()) { ?>
            <option value="<?php echo $donnees['idUser'] ?>"><?php echo $donnees['name'], " ", $donnees['surname'] ?></option>
        <?php } ?>
    </select>
    <button type="submit">Changer l'admin</button>
</form>
</body>
</html>
