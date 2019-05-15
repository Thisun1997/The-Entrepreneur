<?php
session_start();
include 'includes/dbh.inc.php';
include 'includes/user.inc.php';

$User= new User();
$conn=$User->connect();

$result=$User->checkUser();

?>