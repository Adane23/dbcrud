<?php
include("../includes/db_connection.php");

$message = ""; // Initialize an empty message variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sectionID = $_POST["sectionID"];
    $teacherID = $_POST["teacherID"];
    $courseID = $_POST["courseID"];

    // Insert new section
    $sql = "INSERT INTO section (sectionID, teacherID, courseID) VALUES ('$sectionID', '$teacherID', '$courseID')";
    
    if ($conn->query($sql)) {
        $message = "Section added successfully!";
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
    <title>Add New Section</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <h1>Add New Section</h1>

    <?php
    // Display the confirmation message if it is not empty
    if (!empty($message)) {
        echo "<p>{$message}</p>";
    }
    ?>

    <form action="" method="post">
        <label for="sectionID">Section ID:</label>
        <input type="text" name="sectionID" required>
        <br>
        <br>
        <label for="teacherID">Teacher ID:</label>
        <input type="text" name="teacherID" required>
        <br>
        <br>
        <label for="courseID">Course ID:</label>
        <input type="text" name="courseID" required>
        <br>
        <br>
        <input type="submit" value="Add Section">
    </form>

    <a href="index.php">Back to Section List</a>
</body>
</html>
