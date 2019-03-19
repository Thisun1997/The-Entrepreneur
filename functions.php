<?php
require('sever.php'); 
function getUserData($email){
    $db = mysqli_connect('localhost', 'root', '', 'profilesystem') or die("Cannot connect to DB");
    $array = array();
    $q = mysqli_query($db,"SELECT*FROM users WHERE email = '$email'");
    while($r = mysqli_fetch_assoc($q)){
        $array['email'] = $r['email'];
        $array['firstname'] = $r['firstname'];
        $array['lastname'] = $r['lastname'];
        $array['type'] = $r['type'];
    }
    return $array;}


?>