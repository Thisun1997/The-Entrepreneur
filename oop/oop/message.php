<?php
require_once 'core/init.php';


if(Session::exists('session/session_name')){
    
    header('Location: index.php');
    
}
include 'includes/dbh.inc.php';

include 'includes/viewuser.inc.php';
$VUser= new ViewUser();
$conn=$VUser->connect();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/home.css">
</head>

<body>
    <div id="main">

        <h1 style ="background-color: #6495ed; color : white;"><?php echo 
            Input::get('user')?>-online</h1>

            <div class="output" id="output">
                <?php
                $VUser->getMessage();
                ?>
            </div>


        <form method="post" action="send.php" id="pst">
            <textarea id="msd" name="msg" placeholder= "Type to send message...." 
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
            xhr.open('GET', 'update.php');
            xhr.onload = function(){
                if (xhr.status === 200){
                    document.getElementById('output').innerHTML = xhr.responseText;
                }else{
                    document.getElementById('output').innerHTML = xhr.status;
                }
            };
            xhr.send();
         //   console.log('sasas');
        }
        window.setInterval(loadMessages, 1000);


        
        document.getElementById("pst").addEventListener('submit', function(event) {
            event.preventDefault();
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'send.php');
            var text= document.getElementById('msd').val;
            console.log(text);
            var formData = new FormData(document.getElementById('pst'));
            xhr.send(formData);
            document.getElementById('msd').val = "";

        });


    </script>
</body>

 
</html>