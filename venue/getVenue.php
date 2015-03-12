<?php
session_start();
include("../php/connection.php");
if (isset($_POST['addVenue'])) {
	
	if (!$_POST['venType']) {
		$error.="<br />Please select a venue type";
	}

	if (!$_POST['venueName']) {
		$error.="<br />Please enter a venue name";
	}
	
	if (!$_POST['contact']) {
		$error.="<br />Please enter a contact name";
	}

	if (!$_POST['email']) {

		$error.="<br />Please enter a contact email address";
	}
	if (!$_POST['phone']) {

		$error.="<br />Please enter a contact phone number";
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

	$type = mysqli_real_escape_string($link, $_POST['venType']);
	$fName = mysqli_real_escape_string($link, $_POST['venueName']);
	$ven_contact = mysqli_real_escape_string($link, $_POST['contact']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$phone = mysqli_real_escape_string($link, $_POST['phone']);
	$addy = mysqli_real_escape_string($link, $_POST['address']);
	$city = mysqli_real_escape_string($link, $_POST['city']);
	$state = mysqli_real_escape_string($link, $_POST['state']);
	$zip = mysqli_real_escape_string($link, $_POST['zip']);
	$status = mysqli_real_escape_string($link, $_POST['status']);
		
	$sql = "INSERT INTO `venue` (`venue_type`, `name`, `contact_name`, `email`, `phone`, `address`, `city`, `state`, `zip`, `status`) 
				VALUES ('$type', '$fName', '$ven_contact', '$email', '$phone', '$addy','$city', '$state', '$zip', '$status')";
		
	if (mysqli_query($link, $sql)) {
		$result ='<div class="alert alert-success">Venue added!</div>';
	} else {
    	$error="Adding venue failed.";
	}
	}	
	mysqli_close($link);
		 
}
?>

