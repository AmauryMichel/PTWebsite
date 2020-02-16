<?php
include '../model/member.php';
include '../check/checkPost.php';
include '../check/checkConnected.php';

$cat = $_POST['category'];
$cat2 = $_POST['category2'];
$propName = mysqli_real_escape_string($co, $_POST['propName']);
$descr = mysqli_real_escape_string($co, $_POST['descr']);
$date = $_POST['date'];

$query = mysqli_query($co, "SELECT * FROM proposition WHERE idGroup = '$m1->currentGroup' AND propName = '$propName'");
if ($query->num_rows == 0){
    $query = mysqli_query($co, "INSERT INTO proposition (idGroup, idUser, idCat, idCat2, propName, description, dateLimit)
  VALUES ('$m1->currentGroup', '$m1->id', '$cat', NULLIF('$cat2',''), '$propName', NULLIF('$descr',''), NULLIF('$date',''))");
    header("Location: ../detailsGroup.php?idGroup=".$m1->currentGroup);

    $myfile = fopen("../log.txt", "a") or die("Unable to open file!");
    $txt = ": Proposition " . $propName . " created by user n°" . $m1->id . "\n";
    fwrite($myfile, date('l jS \of F Y h:i:s A') . $txt);
    fclose($myfile);
}
else {
    ?>
    <p>
        Une proposition avec ce nom existe déjà, veuillez utiliser un autre nom.<br>
        Cliquez <a href="../propositions.php">ici</a> pour revenir à la page de création de propositions.<br>
        Cliquez <a href="../index.php">ici</a> pour revenir à la page d'accueil.
    </p>
    <?php
}
?>