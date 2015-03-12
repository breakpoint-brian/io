<?php 
session_start();
include("../../php/connection.php");
include("getMembers.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="brian richardson">

    <title>Labor</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">I/O Event Management</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="../../php/logout.php">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li><a href="#">Overview <span class="sr-only">(current)</span></a></li>
					<li><a href="#">Reports</a></li>
					<li><a href="#">Analytics</a></li>
					<li><a href="#">Export</a></li>
				</ul>
		<div class="panel-group nav nav-sidebar" id="accordion" role="tablist" aria-multiselectable="true">
  			<div class="panel panel-default">
    			<div class="panel-heading" role="tab" id="headingOne">
      				<h4 class="panel-title">
        				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          					Labor
        				</a>
      				</h4>
    			</div>
    			<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      				<div class="panel-body">
        				<ul class="nav nav-sidebar">
        					<li><a href="#">Members</a></li>
        					<li><a href="#">Booking</a></li>
        					<li><a href="#">Calendar</a></li>
        				</ul>
        			</div>
    			</div>
  			</div>
  			<div class="panel panel-default">
    			<div class="panel-heading" role="tab" id="headingTwo">
      				<h4 class="panel-title">
        				<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          					Venues
        				</a>
      				</h4>
    			</div>
    			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      				<div class="panel-body">
        				<ul class="nav nav-sidebar">
        					<li><a href="../../venue/index.php">Locations</a></li>
        				</ul>  
        			</div>
    			</div>
  			</div>
  			<div class="panel panel-default">
    			<div class="panel-heading" role="tab" id="headingThree">
      				<h4 class="panel-title">
        				<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          					Events
        				</a>
      				</h4>
    			</div>
    			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      				<div class="panel-body">
        				<ul class="nav nav-sidebar">
        					<li><a href="../../events/index.php">Jobs</a></li>
        				</ul>
        			</div>
    			</div>
  			</div>
		</div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header" id="contentHeader">Members</h1>

          <div class="row placeholders" id="contentDiv">
			<?php echo $result;?>
          	<div class="col-xs-8 col-sm-8 col-md-6 pull-left">
				<div class="panel panel-default">
					<div class="panel-heading text-left"><span><strong>Members</strong></span></div>
  						<div class="panel-body">
							<table class="table table-hover table-condensed table-striped table-bordered" id="memberTable">
      							<thead data-sort-name="name" data-sort-order="desc">
        							<tr>
        								<th data-sortable="true">ID</th>
        								
          								<th data-sortable="true">First Name</th>
 
          								<th data-sortable="true">Last Name</th>
          
          								<th></th>
 
        							</tr>
      							</thead>
      							<tbody id="tableData">
      							</tbody>
    						</table>
						</div>
					</div>
				</div>
			<div class="col-xs-8 col-sm-8 col-md-6 pull-right" id="memberForm">
				<div class="panel panel-primary">
					<div class="panel-heading text-left">Add a new member</div>
  						<div class="panel-body">
							<form id="contactForm" class="form-inline" action="" method="post">
								<div class="btn-group" id="employeeType">
			    					<button type="button" class="form-control btn btn-default dropdown-toggle" name="employeeType" data-toggle="dropdown">
			        					Employee Type <span class="caret"></span>
			    					</button>
			    					<ul class="dropdown-menu" role="menu">
			        					<li><a href="#" data-value="Employee">Employee </a></li>
			        					<li><a href="#" data-value="Contractor">Contractor </a></li>
			    					</ul>
								</div><br />
								<input type ="hidden" id="empType" name="empType" value="">
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
			      				<input type="hidden" name="status" id="status" value="active" />
			      				<input type="submit" class="btn btn-primary" name="addMember" id="addMember" value="Add Member" />
			      			</form>
						</div>
					</div>
				</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/docs.min.js"></script>
    <script src="../../js/bootbox.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../js/ie10-viewport-bug-workaround.js"></script>
	<script>
		$('.dropdown-menu a').on('click', function(){    
     		$('.dropdown-toggle').html($(this).html() + '<span class="caret"></span>');
     		$("#empType").val($(".dropdown-menu a").attr('data-value'));    
 		});
	</script>
 	<script type="text/javascript">
		$(document).ready(function() {
			$("#tableData").load("makeTable.php");
			});
	</script>
  </body>
</html>