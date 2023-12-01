<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $empSSN = $_POST["empSSN"];
    $managerSSN = $_POST["managerSSN"];
    $deptID = $_POST["deptID"];

    // Insert new employee in department
    $sql = "INSERT INTO in_Dept (empSSN, managerSSN, deptID) VALUES ('$empSSN', '$managerSSN', '$deptID')";
    
    if ($conn->query($sql)) {
        $message = "Employee added successfully!";
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
    <title>Add New Employee in Department</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <h1>Add New Employee in Department</h1>
    <?php
    // Display the confirmation message if it is not empty
    if (!empty($message)) {
        echo "<p>{$message}</p>";
    }
    ?>

    <form action="" method="post">
        <label for="empSSN">Employee SSN:</label>
        <input type="text" name="empSSN" required>
        <br>
        <br>
        <label for="managerSSN">Manager SSN:</label>
        <input type="text" name="managerSSN" required>
        <br>
        <br>
        <label for="deptID">Department ID:</label>
        <input type="text" name="deptID" required>
        <br>
        <br>
        <input type="submit" value="Add Employee in Department">
    </form>

    <a href="index.php">Back to Employees in Department List</a>
</body>
</html>
