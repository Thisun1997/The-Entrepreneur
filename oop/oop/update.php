<?php
session_start();
include 'includes/dbh.inc.php';

include 'includes/viewuser.inc.php';
$ob= new Dbh();
$conn=$ob->connect();

$sql = "SELECT * FROM message";
    $result = $conn->query($sql);
    
    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            //echo $_SESSION['name'];
            //echo "" .$row["name"];
         //   if($_SESSION['name'] == "" .$row["name"]){   set other user profile name
            echo "" .$row["firstname"]. " " .": " .$row["msg"]. "<br>"; //." --" .$row["data"]
            echo "<br>";
           // }
        }
    }else{
        echo "Start your convesation";
    }
    $conn->close();
?>