<?php
session_start();
include("../php/register.php");
include("../php/signin.php");

if(isset($_SESSION['login_user'])) {
	header("location: labor/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="brian richardson" content="">

		<title>Sign In or Register</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/signin.css" rel="stylesheet">
		<link href="../css/styles.css" rel="stylesheet">
    
	</head>

	<body>

		<div class="container">
			<div class="pull-right col-md-6">
				<?php echo $result; ?>
				<form style="padding:15px; max-width: 330px; margin:auto;" method="post">
					<h2 class="form-signin-heading" id="regTitle">Register</h2>
					<div class="form-group">
						<label for="regFirstName" class="sr-only">First Name</label>
						<input type="text" style= "font-size: 16px; height:auto;" name="regFirstName" id="regFirstName" class="form-control" placeholder="First name"
						value="<?php echo $_POST['regFirstName']; ?>">
					</div>
					<div class="form-group">
						<label for="regLastName" class="sr-only">Last Name</label>
						<input type="text" style= "font-size: 16px; height:auto;" name="regLastName" id="regLastName" class="form-control" placeholder="Last name"
						value="<?php echo $_POST['regLastName']; ?>">
					</div>
					<div class="form-group">
						<label for="regUserName" class="sr-only">User Name</label>
						<input type="text" style= "font-size: 16px; height:auto;" name="regUserName" id="regUserName" class="form-control" placeholder="User name"
						value="<?php echo $_POST['regUserName']; ?>">
					</div>
					<div class="form-group">
						<label for="regEmail" class="sr-only">Email address</label>
						<input type="email" style= "font-size: 16px; height:auto;" name="regEmail" id="regEmail" class="form-control" placeholder="Email address"
						value="<?php echo $_POST['regEmail']; ?>">
					</div>
					<div class="form-group">
						<label for="regPassword" class="sr-only">Password</label>
						<input type="password" style= "font-size: 16px; height:auto;" name="regPass" id="regPass" class="form-control" placeholder="Password"
						value="<?php echo $_POST['regPass']; ?>">
					</div>
					<button class="btn btn-lg btn-success" type="submit" name="regBtn">Register</button>
				</form>
			</div>
	   
			<div class="pull-left col-md-6">
				<form class="form-signin" method="post">
					<h2 class="form-signin-heading">Sign in</h2>
					<label for="logUserName" class="sr-only">User Name</label>
					<input type="text" id="logUserName" name="logUserName" class="form-control" placeholder="User name" autofocus>
					<label for="logPassword" class="sr-only">Password</label>
					<input type="password" id="logPassword" name="logPassword" class="form-control" placeholder="Password">
					<div class="checkbox">
						<label>
						<input type="checkbox" value="remember-me"> Remember me
						</label>
					</div>
					<button class="btn btn-lg btn-primary" type="submit" name="signIn">Sign in</button>
				</form>
			</div>
	    </div> <!-- /container -->

    
    


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
