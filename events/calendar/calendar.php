<?php 
include("../../php/connection.php");

if ((!isset($_POST['month'])) || (!isset($_POST['year']))) {
	$nowArray = getdate();
	$month = $nowArray['mon'];
	$year = $nowArray['year'];

	} else {
		$month = $_POST['month'];
		$year = $_POST['year'];
	}
	
$start = mktime(12,0,0,$month,1,$year);
$firstDayArray = getdate($start);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="brian richardson">

    <title>Calendar</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="../../css/dashboard.css" rel="stylesheet">
    <link href="../../css/fullcalendar.css" rel="stylesheet">
    <link href="../../css/fullcalendar.print.css" rel="stylesheet" media="print" />
    
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
            <li><a href="../php/logout.php">Logout</a></li>
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
        					<li><a href="../venue/index.php">Locations</a></li>
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
          <h1 class="page-header" id="contentHeader">Calendar</h1>
          <div class="row placeholders" id="calendar">
          </div>
          <div id="fullCalModal" class="modal fade">
    		<div class="modal-dialog">
        		<div class="modal-content">
            		<div class="modal-header">
                		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                		<h4 id="modalTitle" class="modal-title"></h4>
            		</div>
            		<div id="modalBody" class="modal-body">
            			<form id="eventForm" class="form-inline">
            				<div class="form-group">
            					<label for="jobNumber" class="formLabel">Job # </label>
								<input type="number" id="jobNumber" name="jobNumber" class="form-control input-sm" value="" readonly />
							</div>
            			</form>
            		</div>
            		<div class="modal-footer">
                		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    <script src="../../js/moment.min.js"></script>
    <script src="../../js/fullcalendar.js"></script>
    <script src="../../js/jquery-dateFormat.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../js/ie10-viewport-bug-workaround.js"></script>
 	<script type="text/javascript">
 	$(document).ready(function() {
 		
 	 	var calendar = $('#calendar').fullCalendar({
 	        events: 'getJSON.php',
 	        header: {
 	            left: 'prev,next, today',
 	            center: 'title',
 	            right: 'month, basicWeek, basicDay'
 	        },
 	        editable: true,
 	        eventLimit: true,
 	        eventClick: function(event, jsEvent, view) {
 	            $('#modalTitle').html(event.title);
 	            $('#modalBody').html(event.description);
 	            $('#fullCalModal').modal();
 	        },
 	        editable: true,
 	        eventDrop: function(event, delta) {
 	 	        var start = moment(event.start).format("YYYY-MM-DD");
 	 	        var end = event.end || start;
 	 	        var end = moment(end).format("YYYY-MM-DD");
 	 	    	$.ajax({
 	           		url: 'dragEvent.php' ,
 	           		data: 'start='+ start +'&end='+ end +'&id='+ event.id,
 	           		type: "POST"
 	 	    	});
 	        },
 	       	editable: true,
	        eventResize: function(event, delta) {
	 	        var start = moment(event.start).format("YYYY-MM-DD");
	 	        var end = moment(event.end).format("YYYY-MM-DD");
	 	    	$.ajax({
	           		url: 'dragEvent.php' ,
	           		data: 'start='+ start +'&end='+ end +'&id='+ event.id,
	           		type: "POST"
	 	    	});
	        },
 	    });
 	});
	</script>
  </body>
</html>