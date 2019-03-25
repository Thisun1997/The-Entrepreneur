<?php
require('sever.php'); 
function getUserData($email){
    include "config.php";
    $array = array();
    $q = mysqli_query($db,"SELECT*FROM users WHERE email = '$email'");
    while($r = mysqli_fetch_assoc($q)){
        $array['email'] = $r['email'];
        $array['firstname'] = $r['firstname'];
        $array['lastname'] = $r['lastname'];
        $array['type'] = $r['type'];
    }
    return $array;}

function getFacilitatorData($email){
    include "config.php";
    $array = array();
    $q = mysqli_query($db,"SELECT*FROM facilitators WHERE email = '$email'");
    while($r = mysqli_fetch_assoc($q)){
        $array['email'] = $r['email'];
        $array['firstname'] = $r['firstname'];
        $array['lastname'] = $r['lastname'];
        $array['phone-number'] = $r['phone-number'];
        $array['address'] = $r['Address'];
        $array['categories'] = $r['categories'];
        $array['bio'] = $r['bio'];
    }
    return $array;}

function getInventorData($email){
    include "config.php";
    $array = array();
    $q = mysqli_query($db,"SELECT*FROM inventor WHERE email = '$email'");
    while($r = mysqli_fetch_assoc($q)){
        $array['email'] = $r['email'];
        $array['firstname'] = $r['firstname'];
        $array['lastname'] = $r['lastname'];
        $array['phone-number'] = $r['phone-number'];
        $array['address'] = $r['Address'];
        $array['categories'] = $r['categories'];
        $array['bio'] = $r['bio'];
    }
    return $array;}

?>