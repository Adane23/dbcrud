<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $studentID = $_GET['id'];

    // Delete guardian
    $sql = "DELETE FROM guardian WHERE studentID = $studentID";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}

$conn->close();
?>
