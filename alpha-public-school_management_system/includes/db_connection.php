<?php
$servername = "localhost";
$username = "alpha-public-school";
$password = "alpha-public-school";
$dbname = "alpha-public-school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
