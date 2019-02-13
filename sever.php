<?php
	session_start();
	$username = "";
	$firstname = "";
	$lastname = "";
	$profileext = "";
	$aboutme = "";
	$birthday = "";
	$country = "";
	$city = "";
	$errors = array();
	
	$db = mysqli_connect('localhost', 'root', '', 'profilesystem');
	
	if (isset($_POST['register'])){
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$firstname = mysqli_real_escape_string($db,$_POST['firstname']);
		$lastname = mysqli_real_escape_string($db,$_POST['lastname']);
		$profileext = mysqli_real_escape_string($db,$_POST['profileext']);
		$aboutme = mysqli_real_escape_string($db,$_POST['aboutme']);
		$birthday = mysqli_real_escape_string($db,$_POST['birthday']);
		$country = mysqli_real_escape_string($db,$_POST['country']);
		$city = mysqli_real_escape_string($db,$_POST['city']);
		$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
		
		if(empty($username)){
			array_push($errors, "username is required");
		}
		if(empty($password_1)){
			array_push($errors, "password is required");
		}
		if($password_1 != $password_2){
			array_push($errors, "two password do not match");
		}
		
		if(count($errors)==0){
			$password = md5($password_1);
			$sql = "INSERT INTO users (username, firstname, lastname, profileext, aboutme, birthday, country, city, password) Values ('$username', '$firstname', '$lastname', '$profileext','$aboutme', '$birthday', '$country', '$city', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are logged in";
			header('location: index.php');
		}
		
	}
?>