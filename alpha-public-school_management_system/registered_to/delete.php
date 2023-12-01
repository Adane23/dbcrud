<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['section'])) {
    $studentID = $_GET['id'];
    $sectionID = $_GET['section'];

    // Delete the registration
    $sql = "DELETE FROM registered_to WHERE studentID = $studentID AND sectionID = $sectionID";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}

$conn->close();
?>
