<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $studentID = $_GET['id'];

    // Fetch the guardian data
    $sql = "SELECT * FROM guardian WHERE studentID = $studentID";
    $result = $conn->query($sql);
    $guardian = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST['studentID'];
    $fName = $_POST['fName'];
    $mName = $_POST['mName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $relation = $_POST['relation'];
    $address = $_POST['address'];

    // Update guardian
    $sql = "UPDATE guardian SET fName='$fName', mName='$mName', lName='$lName', email='$email', relation='$relation', address='$address' WHERE studentID=$studentID";
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
    <title>Edit Guardian</title>
</head>
<body>
    <h1>Edit Guardian</h1>

    <form action="" method="post">
        <input type="hidden" name="studentID" value="<?php echo $guardian['studentID']; ?>">
        <label for="fName">First Name:</label>
        <input type="text" name="fName" value="<?php echo $guardian['fName']; ?>" required>
        <br>
        <br>
        <label for="mName">Middle Name:</label>
        <input type="text" name="mName" value="<?php echo $guardian['mName']; ?>">
        <br>
        <br>
        <label for="lName">Last Name:</label>
        <input type="text" name="lName" value="<?php echo $guardian['lName']; ?>" required>
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $guardian['email']; ?>" required>
        <br>
        <br>
        <label for="relation">Relation:</label>
        <input type="text" name="relation" value="<?php echo $guardian['relation']; ?>" required>
        <br>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $guardian['address']; ?>" required>
        <br>
        <br>
        <input type="submit" value="Update Guardian">
    </form>

    <a href="index.php">Back to Guardians List</a>
</body>
</html>


