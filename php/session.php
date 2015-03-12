<?php
include("connection.php");

session_start();

$user_check = $_SESSION['login_user'];

$sql = "SELECT user_name FROM registered_users WHERE user_name = '$user_check'";
$query = mysqli_query($link, $sql);

$row = mysqli_fetch_assoc($query);

$login_session = $row['user_name'];

if (!isset($login_session)) {
	mysqli_close($link);
	header("location:../login/index.php");
}
?>