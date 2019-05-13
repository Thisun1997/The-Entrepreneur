<?php

session_start();
include 'includes/dbh.inc.php';
include 'includes/user.inc.php';
include 'includes/viewuser.inc.php';
$User= new User();
$conn=$User->connect();

$User->sendMessage();

?>