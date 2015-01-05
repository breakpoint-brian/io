<?php
session_start();
include("../php/connection.php");
$query = "SELECT `*` FROM `members`";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$memberTable = $row;
?>