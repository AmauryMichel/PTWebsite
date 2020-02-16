<?php
include 'model/member.php';
include 'check/checkSession.php';
?>

<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<html>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="index.php">Nom du site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav float-right">
                <?php
                if (!isset($_SESSION['member'])):
                    ?>
                    <div class="form-inline mt-2 mt-md-0 mr-2">
                        <a class="btn btn-outline-warning my-2 my-sm-0" href="login.php" role="button">Connexion</a>
                    </div>
                    <div class="form-inline mt-2 mt-md-0 mr-2">
                        <a class="btn btn-outline-warning my-2 my-sm-0" href="registration.php" role="button">Inscription</a>
                    </div>

                <?php
                else:
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">Groupes</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <?php
                            $query = mysqli_query($co, "SELECT * FROM `detailsMember` WHERE idUser = '$m1->id'");
                            while ($donnees = $query->fetch_array()) {
                                ?>
                                <a class="dropdown-item"
                                   href="detailsGroup?idGroup=<?php echo $donnees['idGroup'] ?>"><?php echo $donnees['groupName'] ?>
                                    <?php if ($donnees['favorite'] == 1):
                                        echo '<i class="fas fa-star" style="float: right; color: #e4f016"></i>';
                                    else:
                                        echo '<i class="far fa-star" style="float: right;"></i>';
                                    endif; ?>
                                </a>
                            <?php } ?>
                            <a href="group.php" class="dropdown-item">Créer un groupe
                                <img src="https://img.icons8.com/ios/50/000000/plus.png" alt="Plus"
                                     style="height: 30px">
                            </a>
                        </div>
                    </li>


                    <?php
                    $query2 = mysqli_query($co, "SELECT * FROM `detailsFriendRequest` WHERE idUser2 = '$m1->id' AND status= 0");
                    if ($query2->num_rows != 0):
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <img id="logo" src="images/addFriend.png" width="45" height="35"
                                     alt="addFriend"/>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown03">
                                <?php
                                while ($donnees2 = $query2->fetch_array()) { ?>
                                    <div class="dropdown-item">
                                        <form method="POST" action="controller/executeFriendRequest.php">
                                            <?php echo $donnees2['name'], " ", $donnees2['surname'] ?>
                                            <button type="submit" name="requete"
                                                    value="1<?php echo $donnees2['idUser'] ?>">
                                                Accepter
                                            </button>
                                            <button type="submit" name="requete"
                                                    value="2<?php echo $donnees2['idUser'] ?>">
                                                Refuser
                                            </button>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>
                        </li>
                    <?php endif; ?>

                    <?php
                    $query3 = mysqli_query($co, "SELECT * FROM `detailsInvitation` WHERE idUser = '$m1->id'");
                    if ($query3->num_rows != 0):
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <img id="logo" src="images/addGroup.png" class="mr-2" width="45" height="35"
                                     alt="addGroup"/>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown03">
                                <?php
                                while ($donnees3 = $query3->fetch_array()) { ?>
                                    <div class="dropdown-item">
                                        <?php echo $donnees3['groupName'] ?>
                                        <a class="btn btn-primary" style="float:right"
                                           href="controller/invitationGroupes.php?idU=<?php echo $m1->id ?>&idG=<?php echo $donnees3['idGroup'] ?>&link=<?php echo $donnees3['link'] ?>&accept=1">Accepter</a>
                                        <a class="btn btn-primary" style="float:right"
                                           href="controller/invitationGroupes.php?idU=<?php echo $m1->id ?>&idG=<?php echo $donnees3['idGroup'] ?>&link=<?php echo $donnees3['link'] ?>&accept=0">Refuser</a>
                                    </div>
                                <?php } ?>
                            </div>
                        </li>
                    <?php endif; ?>

                    <a href="profile.php?idUser=<?php echo $m1->id ?>">
                        <img id="logo" src="images/logo_client.png" class="mr-2" width="50" height="45" alt="client"/>
                    </a>
                    <div class="form-inline mt-2 mt-md-0 mr-4">
                        <a class="btn btn-outline-warning my-2 my-sm-0" href="logout.php" role="button">Déconnexion</a>
                    </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </nav>
</header>
