<?php include "header.php" ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="css/style_login.css?v=<?php filemtime("css/style_login.css") ?>">
</head>
<body>
<div class="container-fluid">
    <?php
    if (isset($m1)):
        ?>
        <div class="row h-100">
            <div class="col-4 recent" style="overflow: auto">
                <h1 style="text-align: center">Propositions récentes</h1>
                <?php
                $query = mysqli_query($co, "SELECT * FROM `proposition` WHERE idGroup IN (SELECT idGroup FROM `groupmember` WHERE idUser='$m1->id') ORDER BY idProp DESC LIMIT 8");
                while ($donnees = $query->fetch_array()):
                    ?>
                    <a href="" class="row my-3">
                        <h6 style="width: 100%; text-align: center; margin: 0"><?php echo $donnees['propName'] ?></h6>
                        <p class="description" style="width: 100%; overflow: hidden"><?php
                            if ($donnees['description'] != NULL):
                                echo $donnees['description'];
                            else:
                                echo "Pas de description";
                            endif;

                            ?></p>
                    </a>
                <?php
                endwhile;
                ?>
            </div>
            <div class="col-4 bookmarks">
                <h1 style="text-align: center">Favoris</h1>
                <?php
                $query = mysqli_query($co, "SELECT * FROM `detailsmember` WHERE idUser='$m1->id'AND favorite = 1");
                while ($donnees = $query->fetch_array()):
                    ?>
                    <a href="detailsGroup?idGroup=<?php echo $donnees['idGroup'] ?>" class="row my-4 py-3"
                       style="justify-content: center"><?php echo $donnees['groupName'] ?></a>
                <?php
                endwhile;
                ?>
            </div>
            <div class="col-4 other">
                <h1 style="text-align: center">Autres news</h1>
            </div>
        </div>
    <?php
    else:
        ?>
        <h1 class="text-center">Nom du site</h1>
        <p class="text-center my-4">
            Projet Tutoré (les images n'ont aucun rapport avec le projet, c'est juste pour la décoration)
        </p>
        <div class="text-center my-4">
            <img src="IMG_20190219_085913.jpg" alt="Fun ici" style="width: 50vw">
        </div>
    <?php
    endif;
    ?>
</div>

</body>
</html>