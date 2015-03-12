<?php 
include("../php/connection.php");
include("selectBox.php");
include("updateVenue.php");

// Retrieve all the data from the "members" table
$id = $_GET['id'];
$sql = "SELECT * FROM events WHERE `id` =". $id;
$venue_detail = mysqli_query($link, $sql);
// store the record of the "members" table into $row

$row = mysqli_fetch_assoc($venue_detail);

$jobNumber = $row['job_number'];
$type = $row['venue_name'];
$jobName = $row['job_name'];
$start = $row['start_date'];
$end = $row['end_date'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="brian richardson">

    <title>Venue</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    
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
            <li><a href="#">Help</a></li>
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
        					<li><a href="../labor/members/index.php">Members</a></li>
        					<li><a href="#">Booking</a></li>
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
        					<li><a href="#">Locations</a></li>
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
        					<li><a href="../events/index.php">Jobs</a></li>
        					<li><a href="calendar.php">Calendar</a></li>
        				</ul>
        			</div>
    			</div>
  			</div>
		</div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header" id="contentHeader">Edit Job</h1>

          <div class="row placeholders" id="contentDiv">
			<?php echo $result;?>
          	<div class="col-xs-8 col-sm-8 col-md-6 pull-left">
				<div class="panel panel-default">
					<div class="panel-heading text-left"><span><strong>Jobs</strong></span></div>
  						<div class="panel-body">
							<table class="table table-hover table-condensed table-striped table-bordered" id="memberTable">
      							<thead>
        							<tr>
        								<th data-sortable="true">Job Number</th>
          								
          								<th data-sortable="true">Job Name</th>
          								
          								<th data-sortable="true">Start Date</th>
          								
          								<th data-sortable="true">End Date</th>
          
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
					<div class="panel-heading text-left">Edit Job</div>
  						<div class="panel-body">
							<div class="pull-right">
									<label for="jobNumber" class="formLabel">Job # </label>
									<input type="number" id="jobNumber" name="jobNumber" class="form-control input-sm" value="<?php echo $jobNumber; ?>" readonly />
								</div><br />
								<div class="btn-group" id="venue">
									<label for="dropdown" class="formLabel">Venue Name</label><br />
			    					<button type="button" class="form-control btn btn-default btn-sm dropdown-toggle" id="dropdown" name="venue" 
			    					data-toggle="dropdown"><?php echo $type; ?><span class="caret"></span>
			    					</button>
			    					<ul class="dropdown-menu" role="menu" class="venueSelect">
			    						<?php echo $venue_list; ?>
			    					</ul>
								</div>
								<input type ="hidden" id="venName" name="venName" value="">
								<div class="form-group memberInput" style="margin-top:5px;">
									<label for="jobName" class="formLabel">Job Name</label><br />
			      					<input type="text" name="jobName" id="jobName" class="form-control input-md" placeholder="Job Name" 
			      					value="<?php echo $jobName; ?>">
			      				</div><br />
			      				<div class="input-group" id="dateRange">
			      					<label for="jobRange" class="formLabel">Start/End Date</label><br />
    								<input type="date" class="input-sm form-control" name="start" value="<?php echo $start; ?>" />
    								<span>to</span>
    								<input type="date" class="input-sm form-control" name="end" value="<?php echo $end; ?>" />
								</div><br /><br />
			      				<input type="hidden" name="status" id="status" value="active" />
			      				<input type="submit" class="btn btn-primary" name="updateEvent" id="updateEvent" value="Update Event" />
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
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../js/ie10-viewport-bug-workaround.js"></script>
	<script>
		$('.dropdown-menu a').on('click', function(){    
     		$('.dropdown-toggle').html($(this).html() + '<span class="caret"></span>');
     		$("#venType").val($(".dropdown-menu a").attr('data-value'));    
 		});
	</script>
 	<script type="text/javascript">
		$(document).ready(function() {
			$("#tableData").load("eventTable.php");
			});
	</script>
	<script type="text/javascript">
		
			$("#cancelUpdate").load("index.php");
			});
	</script>
  </body>
</html>