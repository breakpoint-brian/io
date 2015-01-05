$(document).ready(function() {
	$("#members").on("click", function() {
		event.preventDefault();
		$("#contentDiv").empty();
		$("#contentHeader").text("Members");
		$("div#contentDiv").load("../labor/forms/members.php");
	});

});