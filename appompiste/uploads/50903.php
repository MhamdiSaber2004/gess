<?php
  $servername = "localhost";
  $database = "a_ness_com_tn";
 $username = "root";
 $password = "";
//  $servername = "localhost";
//  $database = "argon";
//  $username = "root";
//  $password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}



?>