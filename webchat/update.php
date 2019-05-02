<?php
session_start();
include 'dbh.php';

$sql = "SELECT * FROM posts";
    $result = $conn->query($sql);
    
    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            //echo $_SESSION['name'];
            //echo "" .$row["name"];
         //   if($_SESSION['name'] == "" .$row["name"]){   set other user profile name
            echo "" .$row["name"]. " " .": " .$row["msg"]. "<br>"; //." --" .$row["data"]
            echo "<br>";
           // }
        }
    }else{
        echo "Start your convesation";
    }
    $conn->close();
?>