<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $empSSN = $_GET['id'];

    // Delete the employee in department
    $sql = "DELETE FROM in_Dept WHERE empSSN = $empSSN";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}

$conn->close();
?>
