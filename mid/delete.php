<?php
include "config.php";

require('functions.php');
$message = '';
if(isset($_POST['delete']))
{
    $email = $_SESSION['email'];
    $sql = "DELETE FROM users WHERE email='$email'";
    mysqli_query($db,$sql);
    if ($_SESSION['type']= "inventor"){
        $query = "DELETE FROM inventor WHERE email='$email'";
        mysqli_query($db,$query);
        header('location: index.php');}
    if ($_SESSION['type']= "facilitator"){
        $query = "DELETE FROM facilitators WHERE email='$email'";
        mysqli_query($db,$query);
        header('location: index.php');
    }
	
     
}
?>

<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Facilitator account</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style>
  body{
    background: url(img/1920.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;}
  #section1, #footer{
    background:#f5f5f5;
  }
  #section1 img{
    length :450px; 
    height :100px;
    padding-top: 10px;
    padding-bottom: 15px;
}
  #section1 h3{
    padding-top: 15px;
    padding-bottom: 15px;
  }
  i{
    padding-top:30px;
    padding-bottom: 15px;
    color: #8f8f8f;
  }
 h3, h2, p{
   font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
   color: #8f8f8f;
  }
  .box
  {
   width:800px;
   margin:0 auto;
   background-color: #73c1f6;
   padding:10px;
  }
  .panel-body{
      position:relative;
      background-color: white;
      padding:15px;
      margin-bottom:10px;
  }
  #delete{
    background-color:#3496d8;
    border:none;
    padding: 15px 32px;
    font-size: 18px;
    color:white;
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    border-radius:10px;
  }
  #delete:hover{
    background-color:#73c1f6;
  }
  label{
    color:#4388A5;
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-weight: 400;
    font-size: 18px;
  }
    </style>
    <script>
      function func(){
        window.alert("Account deleted successfully!");
      }
      </script>
</head>
 <body>
 <div class="container-fluid" id="section1">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <img src="img/best.png">
        </div>
        <div class="col-md-9 col-sm-6">
        <h3> Delete your account. </h3>
        </div>
      </div>
    </div>
  </div>
<br><br>

  <div class="container box">
      <h2>Delete Account</h2>
      <div class="panel-body">
     <form action="" method="post"> 
     <label>Say why are you leaving us</label>
     <textarea rows="10" cols="100" name="bio" id="bio" class="form-control"></textarea><br>
     <div class="alert alert-danger">
        if you press the <strong>Delete Account</strong> button, you won't be abel to access your account anymore. If you want to access, you have to register again.
    </div>
     <input name = "delete" type = "submit" id = "delete" value = "Delete Account" onclick="func()">
    </form>
</div>
 </div>

<br><br>
    <div class="container-fluid" id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <h3>Need any help?</h3>
          <p>Contact us</p>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-4">
        <i class="fas fa-envelope"></i>
          <p>email@exmple.com</p>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-4">
          <i class="fas fa-phone"></i>
          <p>0112345678</p>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-4">
          <i class="fab fa-linkedin"></i>
          <p>link</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>