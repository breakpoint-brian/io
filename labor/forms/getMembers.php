<?php
session_start();
include("../../php/connection.php");
if (isset($_POST['addMember'])) {

	if (!$_POST['firstName']) {
		$error="<br />Please enter your name";
	}
	
	if (!$_POST['lastName']) {
		$error="<br />Please enter your name";
	}

	if (!$_POST['email']) {

		$error.="<br />Please enter your email address";
	}
	if (!$_POST['phone']) {

		$error.="<br />Please enter a phone number";
	}
	if (!$_POST['address']) {

		$error.="<br />Please enter an address";
	}
	if ($_POST['email']!="" AND !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {

		$error.="<br />Please enter a valid email address";
	}
	if (!$_POST['city']) {
		$error="<br />Please enter a city";
	}
	if (!$_POST['state']) {
		$error="<br />Please enter a state";
	}
	if (!$_POST['zip']) {
		$error="<br />Please enter a zip";
	}
	if ($error) {
		$result='<div class="alert alert-danger"><strong>There were error(s) in your submission:</strong>'.$error.'</div>';
	} else {
		if ($link->connect_error) {
			die("Connection failed: " . $link->connect_error);
		}
		
		$fName = mysqli_real_escape_string($link, $_POST['firstName']);
		$lName = mysqli_real_escape_string($link, $_POST['lastName']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$phone = mysqli_real_escape_string($link, $_POST['phone']);
		$addy = mysqli_real_escape_string($link, $_POST['address']);
		$city = mysqli_real_escape_string($link, $_POST['city']);
		$state = mysqli_real_escape_string($link, $_POST['state']);
		$zip = mysqli_real_escape_string($link, $_POST['zip']);
		
		$sql = "INSERT INTO `1772456_br`.`members` (`ID`, `employee_type`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `state`, `zip`) 
				VALUES (NULL, NULL, \'$fName\', \'$lName\', \'$email\', \'$phone\', \'$addy\', \'$city\', \'$state\', \'$zip\');";
		
		if ($link->query($sql) === TRUE) {
			$result= '<div class="alert alert-success">New member added!</div>';
		} else {
			$error= "<br />There was problem adding the member to the database";
		}
		
		if ($error) {
			$result='<div class="alert alert-danger">'.$error.'</div>';
		}
		
		$link->close();
		} 
	}
?>

