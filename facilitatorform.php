<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$db = new PDO("mysql:host=localhost;dbname=profilesystem", "root", "");
require('functions.php');
$message = '';
if(isset($_POST["email"]))
{
    $firstname="";
	$phone="";
	$address="";
	//if (isset($_POST['register1'])){
		$firstname = mysqli_real_escape_string($db,$_POST['first_name']);
		$lastname = mysqli_real_escape_string($db,$_POST['last_name']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$phone = mysqli_real_escape_string($db,$_POST['phone']);
		$address = mysqli_real_escape_string($db,$_POST['address']);
		$bio = mysqli_real_escape_string($db,$_POST['bio']);
    $category = $_POST['category'];
 		// Finally, register user if there are no errors in the form
 		//if (count($errors) == 0) {
			$gender = $_POST['gender'];
			$dob = $_POST['dob'];
			$newvalues = implode(",",$category);
  			$query = "INSERT INTO facilitators (firstname, lastname, email, `phone-number`,address,gender,DoB,bio,categories) Values ('$firstname', '$lastname', '$email', '$phone','$address','$gender','$dob','$bio','$newvalues')";
			mysqli_query($db, $query);
  			$_SESSION['email'] = $email;
			  //$_SESSION['success'] = "You are now logged in";
			header('location: index.php#register-login');
      //echo("hi");
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
    background: url('img/1920.jpg') no-repeat center center;
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
    top: 270px;
    left: 10%;
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
        <h3> You are only few step away from being a Facilitator. </h3>
        </div>
      </div>
    </div>
  </div>
 <?php  if (isset($_SESSION['email'])) : 
			$userdata = getUserData($_SESSION['email']);
			?>
 <br /><br>
  <div class="container box">
   <br />
   <h2 style="color:white">Facilitator account</h2><br />
   <?php echo $message; ?>
   <form method="post" id="register_form">
    <ul class="nav nav-tabs">
     <li class="nav-item">
      <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Basic Details</a>
     </li>
     <li class="nav-item">
      <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Personal & Professional Details</a>
     </li>
     <li class="nav-item">
      <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Categories</a>
     </li>
    </ul>
    <div class="tab-content" style="margin-top:16px;">
     <div class="tab-pane active" id="login_details">
      <div class="panel panel-default">
       <div class="panel-heading">Basic Details</div>
       <div class="panel-body">
        <div class="form-group">
        <div class="form-group">
         <label>First name</label>
         <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $userdata['firstname']; ?>" readonly="readonly" />
         <span id="error_first_name" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Enter Last Name</label>
         <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $userdata['lastname']; ?>" readonly="readonly"/>
         <span id="error_last_name" class="text-danger"></span>
        </div>
         <label>Email Address</label>
         <input type="text" name="email" id="email" class="form-control" value="<?php echo $userdata['email']; ?>" readonly="readonly"/>
         <span id="error_email" class="text-danger"></span>
        </div>
        <br />
        <div>
         <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
        </div>
        <br />
       </div>
      </div>
     </div>
     <div class="tab-pane fade" id="personal_details">
      <div class="panel panel-default">
       <div class="panel-heading">Fill Personal Details</div>
       <div class="panel-body">
        <div class="form-group">
         <label>Address</label>
         <input type="text" name="address" id="address" class="form-control"/>
         <span id="error_address" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Phone number</label>
         <input type="text" name="phone" id="phone" class="form-control"/>
         <span id="error_phone" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Gender</label>
         <label class="radio-inline">
          <input type="radio" name="gender" value="male" checked> Male
         </label>
         <label class="radio-inline">
          <input type="radio" name="gender" value="female"> Female
         </label>
        </div>
        <div class="form-group">
         <label>Date of Birth</label>
         <input type="date" name="dob" id="txtDate" onkeydown="return false"class="form-control" value="<?php echo $_POST['dob']; ?>"/>
        </div>
        <div class="form-group">
		<label>Bio</label>
    <img class="image" src="img/information-sign-png-5.png" height="12px" />
            <span class="tooltiptext2">
            <ul>
            <li><strong>This bio will be visible to others on your profile</strong></li>
              <li>Say where you are employeed or what your business is.</li>
              <li>Range of investement(money or human resourse)you wish to make.</li>
              <li>Say what are your future aspirations. </li>
              <li>State your claim to fame.</li>
            </ul>
            </span><br>
    <br/>
		<textarea rows="10" cols="100" name="bio" id="bio" class="form-control"></textarea>
        <span id="error_bio" class="text-danger"></span>
        </div>
        <br />
        <div>
         <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
         <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button>
        </div>
        <br />
       </div>
      </div>
     </div>
     <div class="tab-pane fade" id="contact_details">
      <div class="panel panel-default">
       <div class="panel-heading">Select categories</div>
       <div class="panel-body">
       <label> Select one or more categories that you would like to facilitate.</label><br>
       <span id="error_cat" class="text-danger"></span>
        <div class="checkbox required" id="checkbox">
        <div class = "form-group">
					<input type="checkbox" id="category" name="category[]" value="technology"<?php if (!empty($_POST['category'])) if (in_array("technology", $_POST['category'])) echo "checked='checked'"; ?>>Technology<br/>
					<input type="checkbox" id="category" name="category[]" value="Science"<?php if (!empty($_POST['category'])) if (in_array("Science", $_POST['category'])) echo "checked='checked'"; ?>>Science<br/>
					<input type="checkbox" id="category" name="category[]" value="Business"<?php if (!empty($_POST['category'])) if (in_array("Business", $_POST['category'])) echo "checked='checked'"; ?>>Business<br/>
					<input type="checkbox" id="category" name="category[]" value="Art-design"<?php if (!empty($_POST['category'])) if (in_array("Art-design", $_POST['category'])) echo "checked='checked'"; ?>>Art-Design<br/>
					<input type="checkbox" id="category" name="category[]" value="Education"<?php if (!empty($_POST['category'])) if (in_array("Education", $_POST['category'])) echo "checked='checked'"; ?>>Education<br/>
					<input type="checkbox" id="category" name="category[]" value="others"<?php if (!empty($_POST['category'])) if (in_array("others", $_POST['category'])) echo "checked='checked'"; ?>>Others<br/>
			</div>
      </div>
        <br />
        <div>
         <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
         <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg">Register</button>
        </div>
        <br />
       </div>
      </div>
     </div>
    </div>
   </form>
  </div>
  <?php endif ?>
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

<script>
$(document).ready(function(){
 
 $('#btn_login_details').click(function(){
   $('#list_login_details').removeClass('active active_tab1');
   $('#list_login_details').removeAttr('href data-toggle');
   $('#login_details').removeClass('active');
   $('#list_login_details').addClass('inactive_tab1');
   $('#list_personal_details').removeClass('inactive_tab1');
   $('#list_personal_details').addClass('active_tab1 active');
   $('#list_personal_details').attr('href', '#personal_details');
   $('#list_personal_details').attr('data-toggle', 'tab');
   $('#personal_details').addClass('active in');
  }
 );
 
 $('#previous_btn_personal_details').click(function(){
  $('#list_personal_details').removeClass('active active_tab1');
  $('#list_personal_details').removeAttr('href data-toggle');
  $('#personal_details').removeClass('active in');
  $('#list_personal_details').addClass('inactive_tab1');
  $('#list_login_details').removeClass('inactive_tab1');
  $('#list_login_details').addClass('active_tab1 active');
  $('#list_login_details').attr('href', '#login_details');
  $('#list_login_details').attr('data-toggle', 'tab');
  $('#login_details').addClass('active in');
 });
 
 $('#btn_personal_details').click(function(){
  var error_address = '';
  var error_phone = '';
  var error_bio = '';
  var mobile_validation = /^\d{10}$/;

  if($.trim($('#address').val()).length == 0)
  {
   error_address = 'Address is required';
   $('#error_address').text(error_address);
   $('#address').addClass('has-error');
  }
  else
  {
   error_address = '';
   $('#error_address').text(error_address);
   $('#address').removeClass('has-error');
  }
  ///////////////
  if($.trim($('#phone').val()).length == 0)
  {
   error_phone = 'Phone Number is required';
   $('#error_phone').text(error_phone);
   $('#phone').addClass('has-error');
  }
  else
  {
   if (!mobile_validation.test($('#phone').val()))
   {
    error_phone = 'Invalid Mobile Number';
    $('#error_phone').text(error_phone);
    $('#phone').addClass('has-error');
   }
   else
   {
    error_phone = '';
    $('#error_phone').text(error_phone);
    $('#phone').removeClass('has-error');
   }
  }
/////////////
if($.trim($('#bio').val()).length == 0)
  {
   error_bio = 'A Bio is required';
   $('#error_bio').text(error_bio);
   $('#bio').addClass('has-error');
  }
  else
  {
   error_bio = '';
   $('#error_bio').text(error_bio);
   $('#bio').removeClass('has-error');
  }
  if(error_address != '' || error_phone != ''|| error_bio != '')
  {
   return false;
  }
  else
  {
   $('#list_personal_details').removeClass('active active_tab1');
   $('#list_personal_details').removeAttr('href data-toggle');
   $('#personal_details').removeClass('active');
   $('#list_personal_details').addClass('inactive_tab1');
   $('#list_contact_details').removeClass('inactive_tab1');
   $('#list_contact_details').addClass('active_tab1 active');
   $('#list_contact_details').attr('href', '#contact_details');
   $('#list_contact_details').attr('data-toggle', 'tab');
   $('#contact_details').addClass('active in');
  }
 });
 
 $('#previous_btn_contact_details').click(function(){
  $('#list_contact_details').removeClass('active active_tab1');
  $('#list_contact_details').removeAttr('href data-toggle');
  $('#contact_details').removeClass('active in');
  $('#list_contact_details').addClass('inactive_tab1');
  $('#list_personal_details').removeClass('inactive_tab1');
  $('#list_personal_details').addClass('active_tab1 active');
  $('#list_personal_details').attr('href', '#personal_details');
  $('#list_personal_details').attr('data-toggle', 'tab');
  $('#personal_details').addClass('active in');
 });
 
 $('#btn_contact_details').click(function(){
  var error_address = '';
  var error_phone = '';
  var mobile_validation = /^\d{10}$/;
  if($.trim($('#address').val()).length == 0)
  {
   error_address = 'Address is required';
   $('#error_address').text(error_address);
   $('#address').addClass('has-error');
  }
  else
  {
   error_address = '';
   $('#error_address').text(error_address);
   $('#address').removeClass('has-error');
  }
  if($('div.checkbox.required :checkbox:checked').length == 0){
    error_cat = 'Select at least one category';
    $('#error_cat').text(error_cat);
  }
  else{
  error_cat = '';
   $('#error_cat').text(error_cat);
  }
  if(error_address != '' || error_phone != '' || error_cat != '')
  {
   return false;
  }
  else
  {
   $('#btn_contact_details').attr("disabled", "disabled");
   $(document).css('cursor', 'prgress');
   $("#register_form").submit();
   window.alert("You can login now!");
  }
  
 });
 
});

$(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#txtDate').attr('max', maxDate);
});
</script>