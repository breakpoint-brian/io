<?php
session_start();
include("connection.php");
if (isset($_POST['regBtn'])) {

	if (!$_POST['regFirstName']) {
		$error="<br />Please enter your first name";
	}
	
	if (!$_POST['regLastName']) {
		$error.="<br />Please enter your last name";
	}

	if (!$_POST['regEmail']) {

		$error.="<br />Please enter your email address";
	}
	if (!$_POST['regUserName']) {

		$error.="<br />Please enter a user name";
	}
	if (!$_POST['regPass']) {
	
		$error.="<br />Please enter a password";
	}
	if ($_POST['email']!="" AND !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {

		$error.="<br />Please enter a valid email address";
	}
	
	if ($error) {
		$result='<div class="alert alert-danger"><strong>There were error(s) in your submission:</strong>'.$error.'</div>';
	} else {
		
	$fName = mysqli_real_escape_string($link, $_POST['regFirstName']);
	$lName = mysqli_real_escape_string($link, $_POST['regLastName']);
	$email = mysqli_real_escape_string($link, $_POST['regEmail']);
	$uName = mysqli_real_escape_string($link, $_POST['regUserName']);
	$pass = mysqli_real_escape_string($link, $_POST['regPass']);
	$salt_pass = password_hash($pass, PASSWORD_BCRYPT, array('cost' => 10));
	
// 	$date = new DateTime();
// 	$current_date = $date->getTimestamp();   
	$reg_date = date('Y-m-d H:i:s');
		
	$sql = "INSERT INTO `registered_users` (`first_name`, `last_name`, `email`, `user_name`, `password`, `register_date`) 
				VALUES ('$fName', '$lName', '$email', '$uName', '$salt_pass', '$reg_date')";
		
	if ($link->query($sql)) {
		$result ='<div class="alert alert-success">Registration successful. Please log in.</div>';
	} else {
    	$result ='<div class="alert alert-danger">Member not added! '.("$link->errno")." ".$link->error.'</div>';
	}
	}
		
	mysqli_close($link);
		 
}
?>