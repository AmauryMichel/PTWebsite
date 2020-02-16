<?php
include '../model/member.php';
include '../check/checkPost.php';
include '../check/checkConnected.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $catName = $_POST['catName'];
    $query = mysqli_query($co, "SELECT * FROM category WHERE catName = '$catName'");
    if ($query->num_rows == 0) {
        $query = mysqli_query($co, "INSERT INTO category (idGroup, catName) VALUES ('$m1->currentGroup', '$catName')");
        setcookie("successCategory", 1, time() + 5, "/");
        header("Location: ../detailsGroup?idGroup=" . $m1->currentGroup . ".php");

        $myfile = fopen("../log.txt", "a") or die("Unable to open file!");
        $txt = ": Category " . $catName . " created by user n°" . $m1->id . "\n";
        fwrite($myfile, date('l jS \of F Y h:i:s A') . $txt);
        fclose($myfile);
    } else {
        ?>
        <p>
            Une catégorie avec ce nom existe déjà, veuillez utiliser un autre nom.<br>
            Cliquez <a href="../detailsGroup?idGroup=<?php echo $m1->currentGroup ?>.php">ici</a> pour revenir à la page
            de création de catégories.<br>
            Cliquez <a href="../index.php">ici</a> pour revenir à la page d'accueil.
        </p>
        <?php
    }
} else {
    header("Location: index.php");
}
?>
