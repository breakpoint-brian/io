<?php
session_start();
include("../php/connection.php");

// When the user clicks the Add Member button executes form validation and adds member to the database
if ($_POST['addMember']) {
	
	if (!$_POST['empType']) {
		$error.="<br />Please select an employee type";
	}

	if (!$_POST['firstName']) {
		$error.="<br />Please enter your first name";
	}
	
	if (!$_POST['lastName']) {
		$error.="<br />Please enter your last name";
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
		$error.="<br />Please enter a city";
	}
	if (!$_POST['state']) {
		$error.="<br />Please enter a state";
	}
	if (!$_POST['zip']) {
		$error.="<br />Please enter a zip";
	}
	if ($error) {
		$result='<div class="alert alert-danger"><strong>There were error(s) in your submission:</strong>'.$error.'</div>';
	} else {

	$type = mysqli_real_escape_string($link, $_POST['empType']);
	$fName = mysqli_real_escape_string($link, $_POST['firstName']);
	$lName = mysqli_real_escape_string($link, $_POST['lastName']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$phone = mysqli_real_escape_string($link, $_POST['phone']);
	$addy = mysqli_real_escape_string($link, $_POST['address']);
	$city = mysqli_real_escape_string($link, $_POST['city']);
	$state = mysqli_real_escape_string($link, $_POST['state']);
	$zip = mysqli_real_escape_string($link, $_POST['zip']);
	$status = mysqli_real_escape_string($link, $_POST['status']);
		
	$sql = "INSERT INTO `members` (`employee_type`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `state`, `zip`, `status`) 
				VALUES ('$type', '$fName', '$lName', '$email', '$phone', '$addy','$city', '$state', '$zip', '$status')";
		
	if ($link->query($sql)) {
		$result ='<div class="alert alert-success">Member added!</div>';
	} else {
    	$result ='<div class="alert alert-danger">Member not added!</div>';
    	$result .="Table creation failed: (" . $link->errno . ") " . $link->error;
	}
	}	
	mysqli_close($link);
		 
}
?>

