<?php
include("../includes/db_connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ssn = $_POST["ssn"];
    $facName = $_POST["facName"];
    $location = $_POST["location"];

    // Insert new faculty member
    $sql = "INSERT INTO faculty (ssn, facName, location) VALUES ('$ssn', '$facName', '$location')";
    
    if ($conn->query($sql)) {
        $message = "Faculty added successfully!";
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
    <title>Add New Faculty Member</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <h1>Add New Faculty Member</h1>

    <?php
    // Display the confirmation message if it is not empty
    if (!empty($message)) {
        echo "<p>{$message}</p>";
    }
    ?>

    <form action="" method="post">
        <label for="ssn">SSN:</label>
        <input type="text" name="ssn" required>
        <br>
        <br>
        <label for="facName">Faculty Name:</label>
        <input type="text" name="facName" required>
        <br>
        <br>
        <label for="location">Location:</label>
        <input type="text" name="location" required>
        <br>
        <br>
        <input type="submit" value="Add Faculty Member">
    </form>

    <a href="index.php">Back to Faculty List</a>
</body>
</html>
