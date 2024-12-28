<?php session_start();

$servername = "197.240.41.148";
$database = "cjmxjvbk_testt";
$username = "cjmxjvbk";
$password = "07OC24hk@++#";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

