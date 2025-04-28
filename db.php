<?php
$host = "localhost";
$username = "root"; // default username for local MySQL
$password = ""; // default password for local MySQL (if using WAMP)
$database = "mental_health";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
