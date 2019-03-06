<?php include('facilitator-sever.php'); ?>
<?php 
  //session_start(); 
	require('functions.php');
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
	<title>User registartion system</title>
</head>

<body>
	
	<div class="content">
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

	<?php  if (isset($_SESSION['email'])) : 
			$userdata = getUserData($_SESSION['email']);
			?>
			<div class="Regheader">
				<h1> You are few step away from being a member </h1>
				<h2> We need few other information to complete your registartion. So please fill the form</h2>
			</div>

			<form method="post" class="form"  action="facilitatorform.php">
				
				<h3><abbr>Personal information</abbr></h3>
				
				<div class="input-group">
					<label>Account type</label>
					<input type="text" name="type" value="<?php echo $userdata['type']; ?>" readonly="readonly">
				</div>
				<div class="input-group">
					<label>First name</label>
					<input type="text" name="firstname" value="<?php echo $userdata['firstname']; ?>" readonly="readonly">
				</div>
				<div class="input-group">
					<label>Last name</label>
					<input type="text" name="lastname" value="<?php echo $userdata['lastname']; ?>" readonly="readonly">
				</div>
				<div class="input-group">
					<label>Email</label>
					<input type="text" name="email" value="<?php echo $userdata['email']; ?>" readonly="readonly">
				</div>
				<div class="input-group">
					<label>Phone number</label>
					<input type="text" name="phone" value="<?php echo $phone; ?>">
				</div>
				<div class="input-group">
					<label>Address</label>
					<input type="text" name="address" value="<?php echo $address; ?>">
				<div>
				
				<label class="label">Gender</label>
                    <div class="p-t-10">
                        <label class="radio-container m-r-45">Male
                            <input type="radio" name="gender" value="male"<?php if(isset($_POST['gender']) && $_POST['gender'] == 'male')  echo ' checked="checked"';?>/>
                                <span class="checkmark"></span>
                        </label>
                        <label class="radio-container">Female
                            <input type="radio" name="gender" value="female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'female')  echo ' checked="checked"';?>>
                                <span class="checkmark"></span>
                        </label>
                    </div>

				<label>Date of Birth</label>
				<input type="date" name="dob" max="31-12-2019"/>
					

				<h3><abbr>Professional information</abbr></h3>
				
				<label>Bio</label><br>
				<textarea rows="" cols="" name="bio">
				</textarea>
				
				<h3><abbr>Select category</abbr></h3>
				



				</div>
					<div class="container-login100-form-btn">
              		<button type="submit" name="register1" class="btnreglog">Register</button>
          		</div>
				
  

			</form>

		<?php endif ?>

</body>
</html>





