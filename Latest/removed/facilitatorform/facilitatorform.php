<?php include('C:\xampp\htdocs\The Entreprenuer\facilitator-sever.php'); ?>
<?php 
  //session_start(); 
	require('C:\xampp\htdocs\The Entreprenuer\functions.php');
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Step-form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

		<!-- DATE-PICKER -->
		<link rel="stylesheet" href="vendor/date-picker/css/datepicker.min.css">

		<!-- STYLE CSS -->
        <link rel="stylesheet" href="css/step-form.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	</head>
	<body>

		<?php if(isset($_SESSION['success'])): ?>
			<div class='error success'>
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
	<?php endif ?>

    <div class="wrapper">
	<?php  if (isset($_SESSION['email'])) : 
			$userdata = getUserData($_SESSION['email']);
			?>
		
            <form id="wizard" method="post" action="facilitatorform.php">
        		<!-- SECTION 1 -->
                <h4></h4>
                <section>
                    <div class="logo">
                        <img src="E:\Sublime Text\new1\Entrepreneur-Register-Form-Step\colorlib-wizard-9\images\best.png" height="80px">
                    <h3>Facilitator profile</h3>
                    </div>
                	<div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Full Name
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <input type="text" class="form-control" name="firstname" value="<?php echo $userdata['firstname']; ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Last name
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-account-o"></i>
                                <input type="text" class="form-control" name="lastname" value="<?php echo $userdata['lastname']; ?>" readonly="readonly">
                            </div>
                        </div>
                	</div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Email ID
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-email"></i>
                                <input type="text" class="form-control" name="email" value="<?php echo $userdata['email']; ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Phone Number
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-smartphone-android"></i>
                                <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Gender
                            </label>
                            <div class="checkbox-tick">
                                        <label class="male">
                                            <input type="radio" name="gender" value="male"<?php if(isset($_POST['gender']) && $_POST['gender'] == 'male')  echo ' checked="checked"';?>> Male<br>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="female">
                                            <input type="radio" name="gender" value="female"<?php if(isset($_POST['gender']) && $_POST['gender'] == 'female')  echo ' checked="checked"';?>> Female<br>
                                            <span class="checkmark"></span>
                                        </label>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Date of Birth
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-calendar"></i>
                                <input type="text" class="form-control datepicker-here" data-language='en' data-date-format="dd - mm - yyyy" id="dp1" name="dob" value="<?php echo $_POST['dob']; ?>">
                            </div>
                        </div>
                    </div>
                </section>
                
				<!-- SECTION 2 -->
                <h4></h4>
                <section>
                    <div class="logo">
                        <img src="E:\Sublime Text\new1\Entrepreneur-Register-Form-Step\colorlib-wizard-9\images\best.png" height="80px">
                	<h3>Personal Details</h3>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Country
                            </label>
                            <div class="form-holder">
                                <i class="fas fa-globe-americas"></i>
                                <select name="" id="" class="form-control">
                                    <option value="Sri Lanka" class="option">Sri Lanka</option>
                                </select>
                                <i class="zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Street Address
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-pin"></i>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                        <label for="">
                                Bio
                        </label>
                        <div class="text-box">
                            <textarea name="" id="text-box" placeholder="" class="form-control">
                            <?php if(isset($_POST['bio'])) { 
         echo htmlentities ($_POST['bio']); }?>
                            </textarea>
                        </div>
                    </div>
                    </div>  
                </section>

                <!-- SECTION 3 -->
                <h4></h4>
                <section>
                    <div class="logo">
                        <img src="E:\Sublime Text\new1\Entrepreneur-Register-Form-Step\colorlib-wizard-9\images\best.png" height="80px">
                    <h3 style="margin-bottom: 37px;">What categories?</h3>
                    </div>
                    <div class="grid">
                        <div class="grid-item active">
                            <div class="thumb">
                                <img src="images/programming.jpg" alt="">
                                <input type="checkbox" type="checkbox" id="category" name="category[]" value="technology"<?php if (!empty($_POST['category'])) if (in_array("technology", $_POST['category'])) echo "checked='checked'"; ?> style="display: none" />
                            </div>
                            <div class="heading">
                                Technology
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="thumb">
                                <img src="images/book.jpg" alt="" >
                                <input type="checkbox" style="display: none" id="category" name="category[]" value="Education"<?php if (!empty($_POST['category'])) if (in_array("Education", $_POST['category'])) echo "checked='checked'"; ?>/>
                            </div>
                            <div class="heading">
                                Education
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="thumb">
                                <img src="images/business.jpg" alt="">
                                <input type="checkbox" id="category" name="category[]" value="Business"<?php if (!empty($_POST['category'])) if (in_array("Business", $_POST['category'])) echo "checked='checked'"; ?> style="display: none" />
                            </div>
                            <div class="heading">
                                Business
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="thumb">
                                <img src="images/doctor.jpg" alt="">
                                <input type="checkbox" id="category" name="category[]" value="Science"<?php if (!empty($_POST['category'])) if (in_array("Science", $_POST['category'])) echo "checked='checked'"; ?> style="display: none" />
                            </div>
                            <div class="heading">
                                Science
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="thumb">
                                <img src="images/art-design.jpg" alt="">
                                <input type="checkbox" id="category" name="category[]" value="Art-design"<?php if (!empty($_POST['category'])) if (in_array("Art-design", $_POST['category'])) echo "checked='checked'"; ?> style="display: none" />
                            </div>
                            <div class="heading">
                                Art-Design
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="thumb">
                                <img src="images/sports.jpg" alt="">
                                <input type="checkbox" id="category" name="category[]" value="others"<?php if (!empty($_POST['category'])) if (in_array("others", $_POST['category'])) echo "checked='checked'"; ?> style="display: none" />
                            </div>
                            <div class="heading">
                                Other
                            </div>
                        </div>
                    </div>
                    
                </section>
            </form>
		</div>

		<script src="js/jquery-3.3.1.min.js"></script>
		
		<!-- JQUERY STEP -->
		<script src="js/jquery.steps.js"></script>
		<!-- DATE-PICKER -->
		<script src="vendor/date-picker/js/datepicker.js"></script>
		<script src="vendor/date-picker/js/datepicker.en.js"></script>

		<script src="js/main.js"></script>

<!-- Template created and distributed by Colorlib -->
<?php endif ?>
</body>
</html>