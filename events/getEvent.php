<?php
session_start();
include("../php/connection.php");
if ($_POST['addEvent']) {
	
	if (!$_POST['venName']) {
		$error.="<br />Please select a venue";
	}

	if (!$_POST['jobName']) {
		$error.="<br />Please enter a job name";
	}
	
	if (!$_POST['start']) {
		$error.="<br />Please enter a start date";
	}

	if (!$_POST['end']) {

		$error.="<br />Please enter an end date";
	}
	
	if ($error) {
		$result='<div class="alert alert-danger"><strong>There were error(s) in your submission:</strong>'.$error.'</div>';
	} else {

	$venName = mysqli_real_escape_string($link, $_POST['venName']);
	$jobName = mysqli_real_escape_string($link, $_POST['jobName']);
	$jobNumber = mysqli_real_escape_string($link, $_POST['jobNumber']);
	$start = mysqli_real_escape_string($link, $_POST['start']);
	$end = mysqli_real_escape_string($link, $_POST['end']);
	$status = mysqli_real_escape_string($link, $_POST['status']);
		
	$sql = "INSERT INTO `events` (`job_number`, `venue_name`, `job_name`, `start_date`, `end_date`, `status`) 
				VALUES ('$jobNumber', '$venName', '$jobName', '$start', '$end', '$status')";
		
	if (mysqli_query($link, $sql)) {
		$result ='<div class="alert alert-success">Event added!</div>';
	} else {
    	$result ='<div class="alert alert-danger">Adding event failed!' .mysqli_error($link).'</div>';
	}
	}	
	mysqli_close($link);
		 
}
?>

