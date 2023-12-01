<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $ssn = $_GET['id'];

    // Delete the faculty member
    $sql = "DELETE FROM faculty WHERE ssn = $ssn";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}

$conn->close();
?>
