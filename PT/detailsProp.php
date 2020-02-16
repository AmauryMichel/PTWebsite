<?php
include "header.php";
include 'check/checkConnected.php';
include 'controller/setProp.php';
include 'check/checkGroup.php';

$idProp = $_GET['idProp'];

$query = mysqli_query($co, "SELECT * FROM proposition WHERE idProp = '$idProp'");
$donnees = $query->fetch_array();

echo $donnees['propName'], "<br><br>", $donnees['description'], "<br><br>";
?>
<form method="POST" action="./controller/executeVote.php">
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

$query2 = mysqli_query($co, "SELECT * FROM detailsComment WHERE idProp = '$idProp'");
while ($comment = $query2->fetch_array()) {
    ?>

    <?php
    echo $comment['name'], " ", $comment['surname'], " :<br>";
    echo $comment['text'], "<br>";
    $query3 = mysqli_query($co, "SELECT * FROM `reportComment` WHERE idUser = '$m1->id' AND idComment = {$comment['idComment']}");
    if ($query3->num_rows == 0):
        ?>
        <form class="" action="controller/reportComment.php" method="post">
            <button type="submit" name="report" value="<?php echo $comment['idComment'] ?>">Signaler</button>
        </form>
    <?php
    else: ?>
        <button type="button" name="report">Signalé</button><br><br> <?php
    endif;

}
?>

<form action="controller/createComment.php" method="post">
    <input type="text" name="text"><br>
    <input type="submit" name="submit">
</form>
