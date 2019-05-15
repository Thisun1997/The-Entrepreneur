<?php
ob_start();
require_once('core/init.php');
$faci = new Facilitator();
$inv = new Inventor();
if ($faci->isLoggedIn() || $inv->isLoggedIn()) :
  if ($faci->isLoggedIn()){
    if(isset($_POST['yes'])){ 
      if(Input::exists()){
          if(Token::check(Token::generate())){
              $email = $faci->data()->email;
              $faci->delete($email);
              Session::flash('success','<div class="alert alert-danger">
                    Account deleted successfully.
                  </div>');
              Redirect::to('index.php#register-login');
          }
      }
    }
  }
  else if ($inv->isLoggedIn()){
    if(isset($_POST['yes'])){ 
      if(Input::exists()){
          if(Token::check(Token::generate())){
              $email = $inv->data()->email;
              $inv->delete($email);
              Session::flash('success','<div class="alert alert-danger">
                    Account deleted successfully.
                  </div>');
              Redirect::to('index.php#register-login');
          }
      }
    }
  }
  
    

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

 <div class="conatiner">
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <form method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Do you really want to delete your account?</h4>
        <textarea name="reasonm" id="reasonm" class="form-control" style = "display:none;"></textarea>
      </div>
      <div class="modal-footer">
        <a href = ""><button type="submit" class="btn btn-default" id="modal-btn-si" name="yes">Yes</button></a>
        <a href = ""><button type="button" class="btn btn-primary" id="modal-btn-no">No</button></a>
      </div>
    </form>
    </div>
  </div>
</div>
</div>


  <div class="container-fluid" id="section1">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <img src="img/best.png">
        </div>
        <div class="col-md-9 col-sm-6">
        <h3> Delete Account </h3>
        </div>
      </div>
    </div>
  </div>
 
 <br /><br>
  <div class="container box">
   <br />
   <h2 style="color:white">Delete Account</h2><br />
   
   <form method="post" id="register_form">
    <div class="tab-content" style="margin-top:16px;">
     <div class="tab-pane active" id="pass_details">
      <div class="panel panel-default">
       <div class="panel-heading">Reasons for deleting</div>
       <div class="panel-body">

        <div class="form-group">
         <label>Say why are you leaving us</label><br>
         <span id="error_reason"class="text-danger"></span> 
         <br/><textarea rows="10" cols="100" name="reason" id="reason" class="form-control"><?php $reason = escape(Input::get('reason')); ?></textarea>
        </div>
        <div class="alert alert-danger">
                If you press the Delete button your account will be deleted and you won't have access to your account until you sign up again.
        </div>
        <div>
        <button type="button" name="btn_pass_details" id="btn_pass_details" class="btn btn-success btn-lg">Delete</button>
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
  var error_reason = '';
  if($.trim($('#reason').val()).length == 0)
  {
   error_reason = 'Reason for deleting is required';
   $('#error_reason').text(error_reason);
   $('#reason').addClass('has-error');

  }
  else
   {
    error_reason = '';
    $('#error_reason').text(error_reason);
    $('#reason').removeClass('has-error');
   }

  if(error_reason != '')
  {
   return false;
  }
  else{
    $('#reasonm').text($('#reason').val());
 var modalConfirm = function(callback){

    $("#mi-modal").modal('show');

  $("#modal-btn-si").on("click", function(){
    callback(true);
    $("#mi-modal").modal('hide');
    
  });
  
  $("#modal-btn-no").on("click", function(){
    callback(false);
    $("#mi-modal").modal('hide');
  });
};

modalConfirm(function(confirm){
  if(confirm){
    
  }else{
    
  }
});


     
  


  }
});
});

</script>


<?php else:
Redirect::to('index.php')?>

<?php endif ?>
