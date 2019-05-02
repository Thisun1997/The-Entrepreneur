<?php
session_start();
if(!isset($_SESSION['name'])){
    
    header('Location: login.php');
    
}
include 'dbh.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>
<div id="main">
    
<h1 style ="background-color: #6495ed; color : white;"><?php echo 
    $_SESSION['name']?>-online</h1>
    
    <div class="output" id="output">
        <?php $sql = "SELECT * FROM posts";
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
        
    </div>
    
    
    
<form method="post" action="send.php" id="pst">
    
<textarea name="msg" placeholder= "Type to send message...." 
class="form-control"></textarea><br>
<input type="submit" value="Send">    
</form>
<br>
<form action="logout.php">

<input style="width: 100%; background-color: #6495ed; color : white; font-size: 20px;" type="submit" value="Logout">
    
</form>
    
</div> 
    
<script type="text/javascript">
    function loadMessages(){
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'update.php);
        xhr.onload = function(){
            if (xhr.status === 200){
                document.getElementById('output').innerHTML = xhr.responseText;
            }else{
                document.getElementById('output').innerHTML = xhr.status;
            }
        };
        xhr.send();
    }
    window.setInterval(loadMessages, 1000);
    
    
    
    
</script>
</body>

 
</html>