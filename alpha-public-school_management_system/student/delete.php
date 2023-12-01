<?php
include("../includes/db_connection.php");

$confirmationMessage = ""; // Initialize an empty confirmation message

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $studentID = $_GET['id'];

    // Delete the student
    $sql = "DELETE FROM student WHERE studentID = $studentID";
    if ($conn->query($sql)) {
        $confirmationMessage = "Student deleted successfully!";
    } else {
        $confirmationMessage = "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
</head>
<body>
    <h1>Delete Student</h1>

    <?php
    // Display the confirmation message if it is not empty
    if (!empty($confirmationMessage)) {
        echo "<p>{$confirmationMessage}</p>";
    }
    ?>

    <a href="index.php">Back to Student List</a>
</body>
</html>

