<?php
include("../php/connection.php");

$sql = "SELECT * FROM events ORDER BY job_number DESC LIMIT 1";
$query = mysqli_query($link, $sql);

$row = mysqli_fetch_assoc($query);

$lastJobNumber = $row['job_number'] += 1;
?>

