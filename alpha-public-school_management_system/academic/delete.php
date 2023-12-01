<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $studentID = $_GET['id'];

    // Delete the academic record
    $sql = "DELETE FROM academic WHERE studentID = $studentID";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}

$conn->close();
?>
