<?php include('sever.php'); ?>
<!DOCTYPE = html>
<html>
<head>
	<title>User registartion system</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>email</label>
			<input type="text" name="email">
		</div>
		
		<div class="input-group">
			<label>password</label>
			<input type="password" name="password">
		</div>
		
		<div class="input-group">
			<button type="submit" name="login" class="btn">log in</button>
		</div>

		<p>
			Not a member? <a href="register.php">Sign up</a>
		</p>
	</form>
	
</body>
</html>