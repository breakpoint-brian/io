<?php
include("../../php/connection.php");

$sql = "SELECT * FROM events";
$query = mysqli_query($link, $sql);

$return_arr = array();

while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $row_array['title'] = $row['job_name'];
    $row_array['start'] = $row['start_date'];
    $row_array['end'] = $row['end_date'];
    $row_array['id'] = $row['id'];

    array_push($return_arr,$row_array);
}

echo json_encode($return_arr);
?>