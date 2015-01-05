
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="../css/styles.css" rel="stylesheet">
</head>
<body>
<?php
include("../../php/connection.php");
if (isset($_POST['addMember'])) {

	if (!$_POST['firstName']) {
		$error="<br />Please enter your name";
	}
	
	if (!$_POST['lastName']) {
		$error="<br />Please enter your name";
	}

	if (!$_POST['email']) {

		$error.="<br />Please enter your email address";
	}
	if (!$_POST['phone']) {

		$error.="<br />Please enter a phone number";
	}
	if (!$_POST['address']) {

		$error.="<br />Please enter an address";
	}
	if ($_POST['email']!="" AND !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {

		$error.="<br />Please enter a valid email address";
	}
	if (!$_POST['city']) {
		$error="<br />Please enter a city";
	}
	if (!$_POST['state']) {
		$error="<br />Please enter a state";
	}
	if (!$_POST['zip']) {
		$error="<br />Please enter a zip";
	}
	if ($error) {
		$result='<div class="alert alert-danger"><strong>There were error(s) in your submission:</strong>'.$error.'</div>';
	} else {
		if ($link->connect_error) {
			die("Connection failed: " . $link->connect_error);
		}
		
		$fName = mysqli_real_escape_string($link, $_POST['firstName']);
		$lName = mysqli_real_escape_string($link, $_POST['lastName']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$phone = mysqli_real_escape_string($link, $_POST['phone']);
		$addy = mysqli_real_escape_string($link, $_POST['address']);
		$city = mysqli_real_escape_string($link, $_POST['city']);
		$state = mysqli_real_escape_string($link, $_POST['state']);
		$zip = mysqli_real_escape_string($link, $_POST['zip']);
		
		$sql = "INSERT INTO `1772456_br`.`members` (`ID`, `employee_type`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `state`, `zip`) 
				VALUES (NULL, NULL, \'$fName\', \'$lName\', \'$email\', \'$phone\', \'$addy\', \'$city\', \'$state\', \'$zip\');";
		
		if ($link->query($sql) === TRUE) {
			$result= '<div class="alert alert-success">New member added!</div>';
		} else {
			$error= "<br />There was problem adding the member to the database";
		}
		
		if ($error) {
			$result='<div class="alert alert-danger">'.$error.'</div>';
		}
		
		$link->close();
		} 
	}
?>
<?php print_r($_POST); ?>
<div class="col-xs-8 col-sm-8 col-md-6 pull-left">
	<div class="panel panel-default">
		<div class="panel-heading text-left">Members</div>
  			<div class="panel-body">
				<table class="table table-hover table-condensed table-striped table-bordered" id="memberTable">
      				<thead>
        				<tr>
          					<th>First Name</th>
 
          					<th>Last Name</th>
          
          					<th></th>
 
        				</tr>
      				</thead>
      			<tbody>
      				<?php
      				// Retrieve all the data from the "members" table
					$result = mysqli_query($link, "SELECT * FROM members") or die(mysql_error());
					// store the record of the "members" table into $row

					while ($row = mysqli_fetch_array($result)) {
					// Print out the contents of the entry
					echo '<tr>';
					echo '<td>'.$row['first_name'].'</td>';
					echo '<td>'.$row['last_name'].'</td>';
					echo '<td class="text-center"><button type="submit" class="btn btn-primary btn-xs" name="edit">Edit</button></td>';
					echo '</tr>';
						}
					?>
      			</tbody>
    			</table>
			</div>
		</div>
	</div>
<div class="col-xs-8 col-sm-8 col-md-6 pull-right">
	<div class="panel panel-primary">
		<div class="panel-heading text-left">Add a new member</div>
  			<div class="panel-body">
				<form id="contactForm" class="form-inline" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
					<!-- <div class="btn-group" id="employeeType">
    					<button type="button" class="form-control btn btn-default dropdown-toggle" name="employeeType" data-toggle="dropdown">
        					Employee Type <span class="caret"></span>
    					</button>
    					<ul class="dropdown-menu" role="menu">
        					<li><a href="#">Employee </a></li>
        					<li><a href="#">Contractor </a></li>
    					</ul>
					</div><br /> -->
					<div class="form-group memberInput">
						<label for="firstName" class="formLabel">First Name</label><br />
      					<input type="text" name="firstName" id="firstName" class="form-control input-sm" placeholder="First Name">
      				</div>
					<div class="form-group memberInput">
						<label for="lastName" class="formLabel">Last Name</label><br />
      					<input type="text" name="lastName" id="lastName" class="form-control input-sm" placeholder="Last Name">
      				</div><br />
					<div class="form-group memberInput">
						<label for="email" class="formLabel">Email</label><br />
      					<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
      				</div>
      				<div class="form-group memberInput">
      					<label for="phone" class="formLabel">Phone</label><br />
      					<input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Phone">
      				</div><br />
					<div class="form-group memberInput">
      					<label for="address" class="formLabel">Address</label><br />
      					<input type="text" name="address" id="address" class="form-control input-sm" placeholder="Address">
      				</div><br />
					<div class="form-group memberInput">
      					<label for="city" class="formLabel">City</label><br />
      					<input type="text" name="city" id="city" class="form-control input-sm" placeholder="City">
      				</div>
					<div class="form-group memberInput">
      					<label for="state" class="formLabel">State</label><br />
      					<input type="text" name="state" id="state" class="form-control input-sm" placeholder="State">
      				</div>
					<div class="form-group memberInput">
      					<label for="zip" class="formLabel">Zip</label><br />
      					<input type="text" name="zip" id="zip" class="form-control input-sm" placeholder="Zip">
      				</div><br />
      				<input type="submit" class="btn btn-primary" name="addMember" id="addMember" value="Add Member" />
      			</form>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
	$('.dropdown-menu a').on('click', function(){    
    	$('.dropdown-toggle').html($(this).html() + '<span class="caret"></span>');    
	});
	</script>
</body>
</html>