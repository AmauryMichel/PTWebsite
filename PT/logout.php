<?php
include 'model/member.php';
include 'check/checkConnected.php';

$m1->logout();
header("Location: index.php");
?>
