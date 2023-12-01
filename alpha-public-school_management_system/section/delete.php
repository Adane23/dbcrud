<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $sectionID = $_GET['id'];

    // Delete the section
    $sql = "DELETE FROM section WHERE sectionID = $sectionID";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}

$conn->close();
?>
