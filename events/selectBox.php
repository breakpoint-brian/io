<?php
include ("../php/connection.php");

$sql = "SELECT * FROM venue WHERE status ='active'";
$venList = mysqli_query($link, $sql);

while ($row = mysqli_fetch_array($venList)) {
	$venue = $row['name'];
	$venue_list .= '<li><a href"#" data-value="'.$venue.'">'.$venue. '</a></option>';
}
?>