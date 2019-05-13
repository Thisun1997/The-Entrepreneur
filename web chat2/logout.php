<?php
include 'includes/dbh.inc.php';
include 'includes/user.inc.php';

$user = new User();
$user->logout();
?>