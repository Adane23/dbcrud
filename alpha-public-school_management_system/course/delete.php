<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $courseID = $_GET['id'];

    // Delete the course
    $sql = "DELETE FROM course WHERE courseID = $courseID";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}

$conn->close();
?>
