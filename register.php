<?php include('sever.php'); ?>
<!DOCTYPE = html>
<html>
<head>
	<title>User registartion system</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		
		<div class="input-group">
			<label>first name</label>
			<input type="text" name="firstname" value="<?php echo $firstname; ?>">
		</div>
		
		<div class="input-group">
			<label>last name</label>
			<input type="text" name="lastname" value="<?php echo $lastname; ?>">
		</div>
		
		<div class="input-group">
			<label>profileext</label>
			<input type="text" name="profileext" value="<?php echo $profileext; ?>">
		</div>
		
		<div class="input-group">
			<label>about me</label>
			<input type="text" name="aboutme" value="<?php echo $aboutme; ?>">
		</div>
		
		<div class="input-group">
			<label>birthday</label>
			<input type="date" name="birthday" value="<?php echo $birthday; ?>">
		</div>
		
		<div class="input-group">
			<label>country</label>
			<input type="text" name="country" value="<?php echo $country; ?>">
		</div>
		
		<div class="input-group">
			<label>city</label>
			<input type="text" name="city" value="<?php echo $city; ?>">
		</div>
		
		<div class="input-group">
			<label>password</label>
			<input type="password" name="password_1">
		</div>
		
		<div class="input-group">
			<label>confirm password</label>
			<input type="password" name="password_2">
		</div>
		
		<div class="input-group">
			<button type="submit" name="register" class="btn">register</button>
		</div>

		<p>
			Already a member? <a href="login.php">Log in</a>
		</p>
	</form>
	
</body>
</html>