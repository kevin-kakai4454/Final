<?php
global $connect;
$servername = "localhost";
$dbname = "youtube";
$username = "root";
$password = "";

$connect = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connected successfully";
}
