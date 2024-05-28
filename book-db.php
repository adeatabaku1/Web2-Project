<?php

$sname= "localhost";

$unmae= "root";

$password = "passi1";

$db_name = "travel";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
