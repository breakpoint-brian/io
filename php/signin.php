<?php
session_start();
include("connection.php");

$error='';

if(isset($_POST['signIn'])) {
	if (empty($_POST['logUserName']) || empty($_POST['logPassword'])) {
		$error = '<div class="alert alert-danger"><strong>User name or password is empty</strong></div>';
	}
	else {
		$username = $_POST['logUserName'];
		$password = $_POST['logPassword'];
		
		$username = stripslashes($username);
		$password = stripslashes($password);
		
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		
		$sql = "SELECT * FROM `registered_users` WHERE `user_name` = '$username'";
		$query = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($query);
		$pass = $row['password'];
		$count = mysqli_num_rows($query);
		if (password_verify($password, $pass)) {
				header("Location: http://dot01-env.elasticbeanstalk.com/labor/index.php");
				$_SESSION['login_user'] = $row['first_name'];
			}
		else { 
			$error = '<div class="alert alert-danger"><strong>User name or password is invalid</strong></div>';
		}
		mysqli_close($link);
	}
}
?>
