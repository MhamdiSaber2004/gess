<?php

$servername = "102.219.176.39";
$database = "cjmxjvbk_argon_latest";
$username = "cjmxjvbk_argon_latest";
$password = "cjmxjvbk_argon_latest";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

