<?php
include("../php/connection.php");

// Retrieve all the data from the "members" table
$sql = "SELECT * FROM members WHERE status = 'active'";
$member_list = mysqli_query($link, $sql);
// store the record of the "members" table into $row

while ($row = mysqli_fetch_array($member_list)) {
// Print out the contents of the entry
	echo '<tr>';
	echo '<td>'.$row['id'].'</td>';
	echo '<td>'.$row['first_name'].'</td>';
	echo '<td>'.$row['last_name'].'</td>';
	echo '<td class="text-center edit"><a href="edit.php?id='.$row['id'].'" class="btn btn-primary btn-xs editBtn" id="editBtn">Edit</a>
 			<a href="delete.php?id='.$row['id'].'" class="btn btn-danger btn-xs delBtn">Delete</a></td>';
	echo '</tr>';
	}
?>