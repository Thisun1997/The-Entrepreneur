<?php include('sever.php'); ?>
<?php 
  //session_start(); 

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
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="header">
		<h2>home page</h2>
	</div>
	
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

		<?php  if (isset($_SESSION['email'])) : ?>
    		<p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
    		<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	
	</div>
</body>
</html>





