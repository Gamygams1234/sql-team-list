<?php


$server = 'localhost';
$user = 'gamy';
$password = 'test1234';
$name = 'records';

$conn = new mysqli($server, $user, $password, $name); // taking 4 items. (server, username, passwoed, the name of the actual database)


if (!$conn){
	echo "Connection error: " . mysqli_connect_error();
}


?>