<?php
include 'header.php';
include 'check/checkConnected.php';
include 'controller/setGroup.php';
include 'check/checkGroup.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/groups.css?v=<?php filemtime("css/groups.css") ?>">
    <script src="js/group.js"></script>
</head>
<body>
<div class="container-fluid mb-5">
    <?php
    $idGroupCur = $_GET['idGroup'];
    $query = mysqli_query($co, "SELECT groupName FROM `group` WHERE idGroup = '$idGroupCur'");
    $donnees = $query->fetch_array();

    ?>
    <h1 class="text-center"><?php echo $donnees['groupName']; ?></h1>
    <div class="row justify-content-center">
        <button onclick="displayDiv('changeCategory')" class="btn btn-primary">Créer une catégorie pour le groupe
            <i class="fa fa-caret-down"></i>
        </button>
    </div>
    <?php
    if (isset($_COOKIE['successCategory'])):
        ?>
        <span class="row justify-content-center" style="color: green">Catégorie créée !</span>
    <?php
    endif;
    ?>
    <div class="row justify-content-center mb-3">
        <div id="changeCategory" class="mt-3">
            <form method="post" action="controller/createCat.php" class="text-center">
                <input class="text-center mb-2" type="text" name="catName" required
                       placeholder="Nom de la catégorie"><br>
                <button type="submit">Créer la catégorie</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid second-container">
    <div class="row">
        <div class="col-4 text-center">
            <h3 class="mb-3">Propositions</h3>
            <a class="btn btn-outline-primary mb-3" href="listProp.php">Voir les propositions du groupe</a><br>
            <button onclick="displayDiv('proposition')" class="btn btn-outline-secondary mb-3">Créer une proposition
                pour le groupe
                <i class="fa fa-caret-down"></i>
            </button>
            <div id="proposition">
                <form method="post" action="controller/createProp.php">

                    <label for="propName">Nom de la proposition</label>
                    <input id="propName" type="text" name="propName" required><br>

                    <label for="desc">Description</label>
                    <input id="desc" type="text" name="descr"><br>

                    <?php
                    $query = mysqli_query($co, "SELECT * FROM category WHERE idGroup = '$idGroupCur'");
                    ?>
                    <label for="category">Catégorie 1</label>
                    <select onchange="val()" id="category" name="category" required>
                        <option value="" disabled selected>Catégorie</option>
                        <?php while ($donnees = $query->fetch_array()) { ?>
                            <option value="<?php echo $donnees['idCat'] ?>"><?php echo $donnees['catName'] ?></option>
                        <?php } ?>
                    </select>
                    <label for="category2">Catégorie 2</label>
                    <select id="category2" name="category2">
                    </select><br>
                    <label for="date">Date limite</label>
                    <input id="date" type="date" name="date"><br>
                    <button type="submit">Créer la proposition</button>
                </form>
            </div>
        </div>

        <div class="col-4 text-center">
            <h3 class="mb-3">Groupe important ?</h3>
            <form method="POST" action="controller/changeFavorite.php">
                <?php
                $query = mysqli_query($co, "SELECT favorite FROM `detailsMember` WHERE idUser = '$m1->id' AND idGroup = '$m1->currentGroup'");
                $donnees = $query->fetch_array();
                ?>
                <button name="fav" value="<?php echo $donnees['favorite'] ?>"
                <?php
                if ($donnees['favorite'] == 0):
                    echo 'class="submit mb-5 btn btn-success" >Ajouter aux favoris';
                else:
                    echo 'class="submit mb-5 btn btn-danger" >Retirer des favoris';
                endif; ?>
                </button>
            </form>
            <?php if ($m1->isAdminGroup || $m1->isAdminSite): ?>
                <div class="changeAdmin">
                    <button onclick="displayDiv('changeAdmin')" class="btn btn-info mt-5 mb-2">
                        Changer l'administrateur du groupe
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <br>
                    <form id="changeAdmin" method="post" action="controller/executeAdminChange.php">
                        <?php
                        $query = mysqli_query($co, "SELECT * FROM `detailsMember` WHERE idGroup = '$m1->currentGroup' AND idUser != '$m1->id' ORDER BY name");
                        ?>
                        <label>
                            <select name="user" required>
                                <option value="" disabled selected>Nom</option>
                                <?php while ($donnees = $query->fetch_array()) { ?>
                                    <option value="<?php echo $donnees['idUser'] ?>"><?php echo $donnees['name'], " ", $donnees['surname'] ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <button type="submit">Changer l'admin</button>
                    </form>
                </div>
                <br>
                <a class="btn btn-warning my-5" href="controller/deleteGroup.php">Supprimer le groupe</a>
            <?php endif; ?>
        </div>

        <div class="col-4 text-center">
            <h3 class="mb-3">Membres :</h3>
            <a class="btn btn-outline-primary mb-3" href="listMember.php">Voir les membres du groupe</a>
            <br>
            <button onclick="displayDiv('invite')" class="btn btn-outline-secondary mb-3" href="invite.php">Inviter un
                membre dans le groupe
                <i class="fa fa-caret-down"></i>
            </button>
            <div id="invite">
                <form method="post" action="controller/createInvite.php">
                    <?php
                    $query = mysqli_query($co, "SELECT * FROM `user` WHERE idUser NOT IN (SELECT idUser FROM groupMember WHERE idGroup = '$m1->currentGroup') AND idUser NOT IN (SELECT idUser FROM invitation WHERE idGroup = '$m1->currentGroup')");
                    ?>
                    <label>
                        <select name="users" required>
                            <option value="" disabled selected>Nom</option>
                            <?php while ($donnees = $query->fetch_array()) { ?>
                                <option value="<?php echo $donnees['idUser'] ?>"><?php echo $donnees['name'], " ", $donnees['surname'] ?></option>
                            <?php } ?>
                        </select>
                    </label>
                    <button type="submit">Inviter dans le groupe</button>
                </form>
            </div>

        </div>
    </div>
</div>

</div>
</body>
</html>

<script>

</script>
