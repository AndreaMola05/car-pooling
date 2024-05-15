<?php

$db = "car_pooling";
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_connection = mysqli_connect($db_host, $db_user, $db_password);
if (!$db_connection) {
	print "si è verificato un problema tecnico";
	exit;
}
mysqli_select_db($db_connection, $db);
