<?php
if (!$m1->isAdminGroup && !$m1->isAdminSite){
    header('Location: index.php');
}
?>
