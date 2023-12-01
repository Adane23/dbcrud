<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST["studentID"];
    $fName = $_POST["fName"];
    $mName = $_POST["mName"];
    $lName = $_POST["lName"];
    $email = $_POST["email"];
    $relation = $_POST["relation"];
    $address = $_POST["address"];

    // Insert new guardian
    $sql = "INSERT INTO guardian (studentID, fName, mName, lName, email, relation, address) VALUES ('$studentID','$fName', '$mName', '$lName', '$email', '$relation', '$address')";
    
    if ($conn->query($sql)) {
        $message = "Guardian added successfully!";
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
    <title>Add Guardian</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <h1>Add Guardian</h1>
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
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <br>
        <label for="relation">Relation:</label>
        <input type="text" name="relation" required>
        <br>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" required>
        <br>
        <br>
        <input type="submit" value="Add Guardian">
    </form>

    <a href="index.php">Back to Guardians List</a>
</body>
</html>
