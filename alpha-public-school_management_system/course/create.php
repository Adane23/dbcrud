<?php
include("../includes/db_connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $courseID = $_POST["courseID"];
    $cName = $_POST["cName"];
    $creditHrs = $_POST["creditHrs"];

    // Insert new course
    $sql = "INSERT INTO course (courseID, cName, creditHrs) VALUES ('$courseID', '$cName', '$creditHrs')";
    
    if ($conn->query($sql)) {
        $message = "Course added successfully!";
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
    <title>Add New Course</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1>Add New Course</h1>

    <?php
    // Display the confirmation message if it is not empty
    if (!empty($message)) {
        echo "<p>{$message}</p>";
    }
    ?>

    <form action="" method="post">
        <label for="courseID">Course ID:</label>
        <input type="text" name="courseID" required>
        <br>
        <br>
        <label for="cName">Course Name:</label>
        <input type="text" name="cName" required>
        <br>
        <br>
        <label for="creditHrs">Credit Hours:</label>
        <input type="text" name="creditHrs" required>
        <br>
        <br>
        <input type="submit" value="Add Course">
    </form>

    <a href="index.php">Back to Course List</a>
</body>
</html>
