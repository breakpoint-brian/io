<?php
include("../php/connection.php");
if (isset($_POST['updateVenue'])) {

	if (!$_POST['venueName']) {
		$error="<br />Please enter your name";
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
		if (!$link) {
			die("Connection failed: " . mysqli_connect_error());
		}
	}
	$type = mysqli_real_escape_string($link, $_POST['venType']);
	$name = mysqli_real_escape_string($link, $_POST['venueName']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$phone = mysqli_real_escape_string($link, $_POST['phone']);
	$addy = mysqli_real_escape_string($link, $_POST['address']);
	$city = mysqli_real_escape_string($link, $_POST['city']);
	$state = mysqli_real_escape_string($link, $_POST['state']);
	$zip = mysqli_real_escape_string($link, $_POST['zip']);
	$id = mysqli_real_escape_string($link, $_POST['venue_id']);
	
	$sql = "UPDATE `venue` SET `venue_type`='$type', `name`='$name', `email`='$email', `phone`='$phone', 
	`address`='$addy', `city`='$city', `state`='$state', `zip`='$zip' WHERE `id`='$id'";

	if ($link->query($sql)) {
		$result ='<div class="alert alert-success">Venue updated!</div>';
	} else {
		$result ='<div class="alert alert-danger">Venue not updated!</div>';
		$result .="Venue creation failed: (" . $link->errno . ") " . $link->error;
	}

	mysqli_close($link);
	header("location:index.php");
		
}
?>