<?php
include("../../php/connection.php");

$id = $_GET['id'];
$sql = "UPDATE `members` SET `status` = 'inactive' WHERE `id` =". $id; // Need to add row ID

if ($link->query($sql)) {
	$result ='<div class="alert alert-success">Member removed!</div>';
} else {
	$result ='<div class="alert alert-danger">Member not removed!</div>';
	$result .="Member delete failed: (" . $link->errno . ") " . $link->error;
}

mysqli_close($link);
header("location:index.php");

?>
