<?php
$host = "west2-mysql-dot01.cwfdzylebppm.us-west-2.rds.amazonaws.com";
$user = "brian";
$pass = "qamonkey1";
$db = "dot01_db";
$port = 3306;

$link = new mysqli($host, $user, $pass, $db, $port);
if ($link->connect_errno) {
	echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
}
?>