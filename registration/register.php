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
			<label>first name</label>
			<input type="text" name="firstname" value="<?php echo $firstname; ?>">
		</div>
		
		<div class="input-group">
			<label>last name</label>
			<input type="text" name="lastname" value="<?php echo $lastname; ?>">
		</div>
		
		<div class="input-group">
			<label>email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
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


