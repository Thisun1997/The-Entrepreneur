<?php
	session_start();
	$firstname = "";
	$lastname = "";
	$email = "";
	$errors = array();
	
	$db = mysqli_connect('localhost', 'root', '', 'profilesystem') or die("Cannot connect to DB");
	
	if (isset($_POST['register'])){
		$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($db,$_POST['lastname']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
		
		if(empty($firstname)){
			array_push($errors, " - firstname is required");
		}
		if(empty($lastname)){
			array_push($errors, " - lastname is required");
		}
		if(empty($email)){
			array_push($errors, " - email is required");
		}
		if(empty($password_1)){
			array_push($errors, " - password is required");
		}
		if (!(empty($password_1))){
			if (strlen($password_1)<=6){
				array_push($errors," - password is too short");
			}
		}

		if((!empty($password_1))&&(($password_1 == $firstname)||($password_1 == $lastname)||($password_1 == strrev($firstname))||($password_1 == strrev($lastname))||($password_1 == $email)||($password_1 == strrev($email)))){
			array_push($errors," - password should not contain firstanme, lastname and email or their reversed versions.");
		}

		$uc = 0; $lc = 0; $num = 0; $other = 0;
		if(!empty($password_1)){
		for ($i = 0, $j = strlen($password_1); $i < $j; $i++) {
			$c = substr($password_1,$i,1);
			if (preg_match('/^[[:upper:]]$/',$c)) {
				$uc++;
			} elseif (preg_match('/^[[:lower:]]$/',$c)) {
				$lc++;
			} elseif (preg_match('/^[[:digit:]]$/',$c)) {
				$num++;
			} else {
				$other++;
			}
		}
		if ($lc == 0 || $uc==0 || $num==0 || $other == 0){
			array_push($errors," - Your password should contain at least one lowercase letter, uppercase letter, number and special charachter.");
		}
		}


		if($password_1 != $password_2 && !(empty($password_2)) && !(empty($password_1))){
			array_push($errors, " - two passwords do not match");
		}

		$user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  		$result = mysqli_query($db, $user_check_query);
  		$user = mysqli_fetch_assoc($result);
  
  		if ($user) { // if user exists
   			 if ($user['email'] === $email) {
      			array_push($errors, " - email already exists");
    		}
  		}

 		// Finally, register user if there are no errors in the form
 		if (count($errors) == 0) {
  			$password = $password_1;//encrypt the password before saving in the database
  			$query = "INSERT INTO users (firstname, lastname, email, password) Values ('$firstname', '$lastname', '$email', '$password')";
  			mysqli_query($db, $query);
  			$_SESSION['email'] = $email;
  			$_SESSION['success'] = "You are now logged in";
  			header('location: index.php');
  		}
	}
	if (isset($_POST['login'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
  
		if (empty($email)) {
			array_push($errors, "- email is required");
		}
		if (empty($password)) {
			array_push($errors, "- Password is required");
		}
  
		if (count($errors) == 0) {
			//$password = md5($password);
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {
		  		$_SESSION['email'] = $email;
		  		$_SESSION['success'] = "You are now logged in";
		  		header('location: index.php');
			}else {
				array_push($errors, "- Wrong username/password combination");
			}
		}
  	}
?>