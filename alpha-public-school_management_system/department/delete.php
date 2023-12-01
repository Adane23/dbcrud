<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $deptID = $_GET['id'];

    // Delete the department
    $sql = "DELETE FROM department WHERE deptID = $deptID";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}

$conn->close();
?>
