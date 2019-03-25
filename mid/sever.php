<?php
 
    session_start(); 

include "config.php";
	$firstname = "";
	$lastname = "";
	$email = "";
	$errors = array();

	//$db = mysqli_connect('localhost', 'root', '', 'profilesystem') or die("Cannot connect to DB");
	
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
		
		if(!empty($email)){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				array_push($errors," - invalid email address");
			}
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
		  
		if (empty($_POST['type'])){
			array_push($errors, " - type should be selected");
        }
        
        if (empty($_POST['check'])){
            array_push($errors, " - <strong> Please agree to terms and conditions</strong>");
        }

 		// Finally, register user if there are no errors in the form
 		if (count($errors) == 0) {
			$password_hash = password_hash($_POST["password_1"], PASSWORD_DEFAULT);
			//$password = $password_1;//encrypt the password before saving in the database
			$type = $_POST['type'];
  			$query = "INSERT INTO users (firstname, lastname, email, password, type) Values ('$firstname', '$lastname', '$email', '$password_hash' ,'$type')";
  			mysqli_query($db, $query);
  			$_SESSION['email'] = $email;
				//$_SESSION['success'] = "You are now logged in";
				
			if ($type == "facilitator"){
  			header('location: facilitatorform.php');}
			if ($type == "inventor"){
  			header('location: inventorform.php');}
  		}
	}




	$errorslog = array();
	$email2='';
	$password='';
	if (isset($_POST['login'])) {
		$email2 = mysqli_real_escape_string($db, $_POST['emaillog']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
  
		if (empty($email2)) {
			array_push($errorslog, "- email is required");
		}
		if (empty($password)) {
			array_push($errorslog, "- Password is required");
		}
  
		if (count($errorslog) == 0) {
			$q = mysqli_query($db,"SELECT*FROM users WHERE email='$email2'");
			$r = mysqli_fetch_assoc($q);
			$hash = $r['password'];
			$type = $r['type'];
			if (password_verify($password, $hash)) {
				$query = "SELECT * FROM users WHERE email='$email2' AND password='$hash'";
				$results = mysqli_query($db, $query);
				if ((mysqli_num_rows($results) == 1) AND ($type=="facilitator")) {
					$query1 = "SELECT * FROM facilitators WHERE email IN ('$email2')";
					$results1 = mysqli_query($db, $query1);
					if (mysqli_num_rows($results1) == 1){
					//echo $results1;
		  			$_SESSION['email'] = $email2;
		  			//$_SESSION['success'] = "You are now logged in";
					  header('location: facilitatorprofile.php?email='.$email2);}
					else{
						header('location: facilitatorform.php');
					}
				} 
				else if ((mysqli_num_rows($results) == 1) AND ($type=="inventor")) {
					$query1 = "SELECT * FROM inventor WHERE email IN ('$email2')";
					$results1 = mysqli_query($db, $query1);
					if (mysqli_num_rows($results1) == 1){
					//echo $results1;
		  			$_SESSION['email'] = $email2;
		  			//$_SESSION['success'] = "You are now logged in";
					  header('location: http://localhost/The%20Entreprenuer/inventorprofile.php?email='.$email2);}
					else{
						header('location: inventorform.php');
					}
				} 
				else {
				array_push($errorslog, "- Wrong username/password combination");
				}
			}
			else {
				array_push($errorslog, "- Wrong userme/password combination");
			}
		}
	}
?>