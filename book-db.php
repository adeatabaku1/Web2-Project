<?php

$sname= "localhost";

$unmae= "root";

$password = "220756100081";

$db_name = "travel";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
