<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	$firstname="";
	$phone="";
	$address="";
	$work="";
	$errors = array();

	$db = mysqli_connect('localhost', 'root', '', 'profilesystem') or die("Cannot connect to DB");
	//echo $_POST;
	if (isset($_POST['register1'])){
		$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($db,$_POST['lastname']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$phone = mysqli_real_escape_string($db,$_POST['phone']);
		$address = mysqli_real_escape_string($db,$_POST['address']);
		$bio = mysqli_real_escape_string($db,$_POST['bio']);
		

		if(empty($phone)){
			array_push($errors, "fields marked with * required to be filled");
		}
		
 		// Finally, register user if there are no errors in the form
 		if (count($errors) == 0) {
			$gender = $_POST['gender'];
			$dob = $_POST['dob'];
  			$query = "INSERT INTO facilitators (firstname, lastname, email, `phone-number`,address,gender,DoB,bio) Values ('$firstname', '$lastname', '$email', '$phone','$address','$gender','$dob','$bio')";
			//echo ($query); 
			mysqli_query($db, $query);
  			$_SESSION['email'] = $email;
			  //$_SESSION['success'] = "You are now logged in";
			//header('location: index.php');
			//echo("hi");
          }
          else{ echo "error";}
	}
