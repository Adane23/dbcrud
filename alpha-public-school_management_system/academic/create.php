<?php
include("../includes/db_connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $studentID = $_POST["studentID"];
    $enrollDate = $_POST["enrollDate"];
    $grade = $_POST["grade"];

    // Insert new academic record
    $sql = "INSERT INTO academic (studentID, enrollDate, grade) VALUES ('$studentID', '$enrollDate', '$grade')";
    
    if ($conn->query($sql)) {
        $message = "Academic added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Academic Record</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1>Add New Academic Record</h1>

    <?php
    // Display the confirmation message if it is not empty
    if (!empty($message)) {
        echo "<p>{$message}</p>";
    }
    ?>

    <form action="" method="post">
        <label for="studentID">Student ID:</label>
        <input type="text" name="studentID" required>
        <br>
        <label for="enrollDate">Enroll Date:</label>
        <input type="text" name="enrollDate" required>
        <br>
        <label for="grade">Grade:</label>
        <input type="text" name="grade" required>
        <br>
        <input type="submit" value="Add Academic Record">
    </form>

    <a href="index.php">Back to Academic Records List</a>
</body>
</html>
