<?php
$servername = "102.219.176.39";
$database = "cjmxjvbk_argon_latest";
$username = "cjmxjvbk_argon_latest";
$password = "cjmxjvbk_argon_latest";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection database failed: " . $e->getMessage();
}




?>