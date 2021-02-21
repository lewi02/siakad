<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siakad";

// create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// check connection 
if($connect->connect_error) {
	die("Connection Failed : " . $connect->connect_error);
} else {
	// echo "Successfully Connected";
}