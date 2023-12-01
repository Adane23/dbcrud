<?php
include("../includes/db_connection.php");


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $studentID = $_GET['id'];

    // Fetch the student data
    $sql = "SELECT * FROM student WHERE studentID = $studentID";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST['studentID'];
    $fName = $_POST["fName"];
    $mName = $_POST["mName"];
    $lName = $_POST["lName"];
    $DoB = $_POST["DoB"];
    $address = $_POST["address"];

    // Update student
    $sql = "UPDATE student SET fName='$fName', mName='$mName', lName='$lName', DoB='$DoB', address='$address' WHERE studentID=$studentID";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>

    <form action="" method="post">
        <input type="hidden" name="studentID" value="<?php echo $student['studentID']; ?>">
        <label for="fName">First Name:</label>
        <input type="text" name="fName" value="<?php echo $student['fName']; ?>" required>
        <br>
        <br>
        <label for="mName">Middle Name:</label>
        <input type="text" name="mName" value="<?php echo $student['mName']; ?>">
        <br>
        <br>
        <label for="lName">Last Name:</label>
        <input type="text" name="lName" value="<?php echo $student['lName']; ?>" required>
        <br>
        <br>
        <label for="DoB">Date of Birth:</label>
        <input type="text" name="DoB" value="<?php echo $student['DoB']; ?>" required>
        <br>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $student['address']; ?>" required>
        <br>
        <br>
        <input type="submit" value="Save Changes">
    </form>

    <a href="index.php">Back to Student List</a>
</body>
</html>
