<?php
require_once 'core/init.php';

$user = new Facilitator;
$user->logout();

Redirect::to('index.php');
?>