<?php
include("../includes/db_connection.php");
$message = ""; // Initialize an empty message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $studentID = $_POST["studentID"];
    $sectionID = $_POST["sectionID"];

    // Insert new registration
    $sql = "INSERT INTO registered_to (studentID, sectionID) VALUES ('$studentID', '$sectionID')";
    
    if ($conn->query($sql)) {
        $message = "Registere Student successfully!";
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
    <title>Register Student to Section</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    
    <h1>Register Student to Section</h1>
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
        <label for="sectionID">Section ID:</label>
        <input type="text" name="sectionID" required>
        <br>
        <br>
        <input type="submit" value="Register Student">
    </form>

    <a href="index.php">Back to Registered Students List</a>
</body>
</html>
