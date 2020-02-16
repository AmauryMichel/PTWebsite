<?php
include "header.php";
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
<div class="listProp h-100 w-25" style="overflow: auto; border-right: 1px solid black">
    <?php
    $query = mysqli_query($co, "SELECT * FROM `proposition` WHERE idGroup = '$m1->currentGroup'");
    while ($donnees = $query->fetch_array()) { ?>
        <div class="proposition my-3">
            <form action="controller/executeVote.php" method="POST">
                <a href="detailsProp.php?idProp=<?php echo $donnees['idProp'] ?>">Proposition
                    n°<?php echo $donnees['idProp'] ?>
                    : <?php echo $donnees['propName'] ?></a>
                <input type='hidden' name='idProp' value='<?php echo $donnees['idProp'] ?>'/>
                <?php
                if ($donnees['dateLimit'] === null || $donnees['dateLimit'] > date("Y-m-d")) {
                    $query2 = mysqli_query($co, "SELECT * FROM `vote` WHERE idUser = '$m1->id' AND idProp = {$donnees['idProp']}");
                    if ($query2->num_rows == 0):
                        ?>
                        <button type="submit" name="vote" value="1">Voter pour</button>
                        <button type="submit" name="vote" value="0">Voter contre</button>
                    <?php else: ?>
                        <button type="button" name="vote">Voté</button>
                    <?php endif;
                }
                if ($donnees['dateLimit'] === null || $donnees['dateLimit'] < date("Y-m-d")) {
                    echo "<br> Votes pour : ", $donnees['voteFor'];
                    echo "<br> Votes contre : ", $donnees['voteAgainst'];
                } ?>

            </form>
            <?php
            $query3 = mysqli_query($co, "SELECT * FROM `reportProp` WHERE idUser = '$m1->id' AND idProp = {$donnees['idProp']}");
            if ($query3->num_rows == 0):
                ?>
                <form action="controller/reportProp.php" method="post">
                    <button type="submit" name="report" value="<?php echo $donnees['idProp'] ?>">Signaler</button>
                </form>
            <?php
            else: ?>
                <button type="button" name="report">Signalé</button> <?php
            endif;
            ?>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>
