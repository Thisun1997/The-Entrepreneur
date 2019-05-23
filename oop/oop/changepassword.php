<?php
require_once('core/init.php');
$inventor = new Inventor();
$facilitator = new Facilitator();
if (($facilitator->isLoggedIn()) || ($inventor->isLoggedIn())) : 
  if((time()-$_SESSION['last_time'])>60){
    $inventor->logout();
    Session::flash('success','<div class="alert alert-danger">
                    Sorry!. Session timeout, password changed unsuccessfull. please log in and try again.
                  </div>');
    Redirect::to('index.php');}
  else{
if (($facilitator->isLoggedIn())){ 
    if(Input::exists()){
        if(Token::check(Token::generate())){
             if(!(password_verify(Input::get('cpassword'),$facilitator->getpass()->password))) {
                Session::flash('error','<div class="alert alert-danger">
                current password is incorrect.
              </div>');
             }
            else{
                Session::delete('error');
               
                try{
                  $facilitator->update(array(
                      '`password`'=>Hash::make(Input::get('npassword')),
                  ),'users');
                  $facilitator->logout();
                  Session::flash('success','<div class="alert alert-success">
                    password changed successfully.
                  </div>');
                  Redirect::to('index.php#register-login');
                  }
                  catch(Exception $e){
                    die($e->getMessage());
                }}}}}
else{  
  if(Input::exists()){
    if(Token::check(Token::generate())){
                if(!(password_verify(Input::get('cpassword'),$inventor->getpass()->password))){
                  Session::flash('error','<div class="alert alert-danger">
                  current password is incorrect.
                </div>');
                } 
                else{            
                try{
                  $inventor->update(array(
                      '`password`'=>Hash::make(Input::get('npassword')),
                  ),'users');
                  $inventor->logout();
                  Session::flash('success','<div class="alert alert-success">
                    password changed successfully.
                  </div>');
                  Redirect::to('index.php#register-login');
                  }
                  catch(Exception $e){
                    die($e->getMessage());
                }}}
            }
        }}

       
?>

<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>change password</title>
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
  background-size: cover;
  }
  .box
  {
   width:800px;
   margin:0 auto;
   background-color: #73c1f6;
  }
  .active_tab1
  {
   background-color:#fff;
   color:#3496d8;
   font-weight: 600;
   font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
   font-size: 20px;
  }
  .inactive_tab1
  {
   background-color: rgb(239, 239, 247);
   color: #3496d8;
   cursor: not-allowed;
   font-size:20px;
   font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  }
  .has-error
  {
   border-color:#cc0000;
   background-color:#f2dede;
  }
  textarea 
  {
    border-radius : 5px;
  }
  .btn-lg
  {
    padding: 15px 32px;
    font-size: 18px;
  }
  .btn-info
  {
    background-color:#3496d8;
    border:none;
  }
  .btn-info:hover{
    background-color:#73c1f6;
  }
  .btn-success{
    background-color:#3496d8;
    border:none;
  }
  .btn-success:hover{
    background-color:#73c1f6;
  }
  .btn-success:hover, .btn-success:focus, .btn-success:active{
    background-color:#73c1f6 !important;
    border:none !important;
  }
  label{
    color:#4388A5;
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-weight: 400;
    font-size: 18px;
  }
  .panel-heading{
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-weight: 400;
    font-size: 18px;
  }
  .panel-body{
    position:relative;
  }
  .checkbox{
    color:#4388A5;
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-weight: 400;
    font-size: 18px;
    margin-left: 60px;
  }
  input{
    font-size:18px;
  }
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
 p{
   font-size: 15px;
 }
 .image{
  height:12px;
  position: relative;
}
.image + .tooltiptext2 {
    visibility: hidden;
    width: 50%;
    background-color: #f2dede;
    color: #a94442;
    text-align: left;
    border-radius: 6px;
    position: absolute;
    z-index: 1;
    top: 60px;
    left: 20%;
    font-size: 12px;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    border: 1px solid #a94442;
    padding: 10px;
    padding-bottom:0px;
    /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
    opacity: 0;
    transition: opacity 1s;
}
.image + .tooltiptext2::after {
    content: "";
    position: absolute;
    top: 50%;
    right: 100%;
    margin-top: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: transparent #a94442 transparent transparent;
}
.image:hover + .tooltiptext2 {
    visibility: visible;
    opacity: 1;
}
  </style>
 </head>
 <body>
  <div class="container-fluid" id="section1">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <img src="img/best.png">
        </div>
        <div class="col-md-9 col-sm-6">
        <h3> Change your password. </h3>
        </div>
      </div>
    </div>
  </div>
 
 <br /><br>
  <div class="container box">
   <br />
   <h2 style="color:white">Change password</h2><br />
   
   <form method="post" id="register_form">
    <div class="tab-content" style="margin-top:16px;">
     <div class="tab-pane active" id="pass_details">
      <div class="panel panel-default">
       <div class="panel-heading">Password Details</div>
       <div class="panel-body">
       <?php if(Session::exists('error')){
            echo Session::flash('error');
          } ?>
        <div class="form-group">
         <label>Current password</label>    <span toggle="#cpassword" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
         <input type="password" name="cpassword" id="cpassword" class="form-control"  />
         <span id="error_cpassword" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>New password</label>    
         <img class="image" src="img/information-sign-png-5.png" height="12px" />
            <span class="tooltiptext2">
            <ul>
            <li>Your password should contain at least <strong>six</strong> charachters.</li>
              <li>Your password should contain at least one lowercase letter, uppercase letter, number and a special charachter.</li>
              <li>Your password should not contain firstanme, lastname and email or their reversed versions.</li>
            </ul>
            </span>
            <span toggle="#npassword" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
         <input type="password" name="npassword" id="npassword" class="form-control" />
         <span id="error_npassword" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>New password again</label>  <span toggle="#napassword" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
         <input type="password" name="naapassword" id="napassword" class="form-control" />
         <span id="error_napassword" class="text-danger"></span>
        </div>
        <br />
        <div>
        <button type="button" name="btn_pass_details" id="btn_pass_details" class="btn btn-success btn-lg">Change</button>
        </div>
        <br />
       </div>
      </div>
     </div>
   </form>
  </div></div>
  
 
 </body>
</html>

<script>
$(document).ready(function(){
 
 
 $('#btn_pass_details').click(function(){
  var error_cpassword = '';
  var error_npassword = '';
  var error_napassword = '';
  if($.trim($('#cpassword').val()).length == 0)
  {
   error_cpassword = 'Current password is required';
   $('#error_cpassword').text(error_cpassword);
   $('#cpassword').addClass('has-error');
  }
  else
   {
    error_cpassword = '';
    $('#error_cpassword').text(error_cpassword);
    $('#cpassword').removeClass('has-error');
   }


  var str = $.trim($('#npassword').val());
  if($.trim($('#npassword').val()).length == 0)
  {
   error_npassword = 'New password is required';
   $('#error_npassword').text(error_npassword);
   $('#npassword').addClass('has-error');
  }
  else {
    if($.trim($('#npassword').val()).length < 6){
        error_npassword = 'password must be a minimum of 6 characters. ';
        $('#error_npassword').text(error_npassword);
        $('#npassword').addClass('has-error');
        }
    else if($.trim($('#npassword').val()) != $.trim($('#napassword').val())){
        error_npassword = 'Two passwords do not match';
        $('#error_npassword').text(error_npassword);
        $('#npassword').addClass('has-error');
        }
    else if(!(str.match(/[0-9]/m) && str.match(/[a-z]/m) && str.match(/[A-Z]/m) && str.match(/[!@#$%^&*?]/m))){
        error_npassword = 'Your password should contain at least one lowercase letter, uppercase letter, number and special charachter';
        $('#error_npassword').text(error_npassword);
        $('#npassword').addClass('has-error');
        }
    else{
        error_npassword = '';
        $('#error_npassword').text(error_npassword);
        $('#npassword').removeClass('has-error');
        }
    }

  if($.trim($('#napassword').val()).length == 0)
  {
   error_napassword = 'New password is required again';
   $('#error_napassword').text(error_napassword);
   $('#napassword').addClass('has-error');
  }
  else {
    if($.trim($('#npassword').val()) != $.trim($('#napassword').val())){
        error_napassword = 'Tow passwords do not match';
        $('#error_napassword').text(error_napassword);
        $('#napassword').addClass('has-error');
    }
    else{
        error_napassword = '';
        $('#error_napassword').text(error_napassword);
        $('#napassword').removeClass('has-error');
    }
  }
  if(error_cpassword != '' || error_npassword != '' || error_napassword != '')
  {
   return false;
  }
  else
  {
   $('#btn_pass_details').attr("disabled", "disabled");
   $(document).css('cursor', 'prgress');
   $("#register_form").submit();
  }
  
 });

 $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye-slash fa-eye");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
 
});

</script>

<?php else:
Redirect::to('index.php')?>

<?php endif ?>