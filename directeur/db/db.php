<?php session_start();

$servername = "102.219.176.27";
$database = "cjmxjvbk";
$username = "cjmxjvbk_testt";
$password = "07OC24hk@++#";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

