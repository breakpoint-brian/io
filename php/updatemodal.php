<?php
	session_start();
	include("../php/connection.php");
	$query = "SELECT `text` FROM `blog` WHERE id=1 LIMIT 1";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_array($result);
	$fireworks = $row['text'];
	
	$query = "SELECT `text` FROM `blog` WHERE id=3 LIMIT 1";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_array($result);
	$g2 = $row['text'];
	
	$query = "SELECT `text` FROM `blog` WHERE id=4 LIMIT 1";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_array($result);
	$chance = $row['text'];
	
	$query = "SELECT `text` FROM `blog` WHERE id=5 LIMIT 1";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_array($result);
	$gulfReturn = $row['text'];
	
	$query = "SELECT `text` FROM `blog` WHERE id=6 LIMIT 1";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_array($result);
	$earlyBird = $row['text'];
?>

