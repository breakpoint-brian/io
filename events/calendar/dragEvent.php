<?php
include("../../php/connection.php");

$id = mysqli_real_escape_string($link, $_POST['id']);
$dateStart = mysqli_real_escape_string($link, $_POST['start']);
$dateEnd = mysqli_real_escape_string($link, $_POST['end']);

$sql = "UPDATE `events` SET `start_date` = '$dateStart', `end_date` = '$dateEnd' WHERE `id` = '$id'";

if ($link->query($sql)) {
		$result ='<div class="alert alert-success">Venue updated!</div>';
	} else {
		$result ='<div class="alert alert-danger">Venue not updated!</div>';
		$result .="Venue creation failed: (" . $link->errno . ") " . $link->error;
	}

	mysqli_close($link);
?>