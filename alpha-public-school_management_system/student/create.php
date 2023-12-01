<?php
include("../includes/db_connection.php");


$message = ""; // Initialize an empty message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $studentID = $_POST["studentID"];
    $fName = $_POST["fName"];
    $mName = $_POST["mName"];
    $lName = $_POST["lName"];
    $DoB = $_POST["DoB"];
    $address = $_POST["address"];

    // Insert new student
    $sql = "INSERT INTO student (studentID, fName, mName, lName, DoB, address) VALUES ('$studentID','$fName', '$mName', '$lName', '$DoB', '$address')";

    if ($conn->query($sql)) {
        $message = "Student added successfully!";
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
    <title>Add New Student</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    
    <h1>Add New Student</h1>

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
        <br>
        <label for="fName">First Name:</label>
        <input type="text" name="fName" required>
        <br>
        <br>
        <label for="mName">Middle Name:</label>
        <input type="text" name="mName">
        <br>
        <br>
        <label for="lName">Last Name:</label>
        <input type="text" name="lName" required>
        <br>
        <br>
        <label for="DoB">Date of Birth:</label>
        <input type="text" name="DoB" required>
        <br>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" required>
        <br>
        <br>
        <input type="submit" value="Add Student">
    </form>

    <a href="index.php">Back to Student List</a>
</body>
</html>
