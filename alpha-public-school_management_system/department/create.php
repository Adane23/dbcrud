<?php
include("../includes/db_connection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deptID = $_POST["deptID"];
    $deptName = $_POST["deptName"];
    $email = $_POST["email"];

    // Insert new department
    $sql = "INSERT INTO department (deptID, depName, email) VALUES ('$deptID', '$deptName', '$email')";
    
    if ($conn->query($sql)) {
        $message = "Department added successfully!";
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
    <title>Add New Department</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <h1>Add New Department</h1>

    <?php
    // Display the confirmation message if it is not empty
    if (!empty($message)) {
        echo "<p>{$message}</p>";
    }
    ?>

    <form action="" method="post">
        <label for="deptID">Department ID:</label>
        <input type="text" name="deptID" required>
        <br>
        <br>
        <label for="deptName">Department Name:</label>
        <input type="text" name="deptName" required>
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email">
        <br>
        <br>
        <input type="submit" value="Add Department">
    </form>

    <a href="index.php">Back to Department List</a>
</body>
</html>
