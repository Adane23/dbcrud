<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $ssn = $_GET['id'];

    // Fetch the faculty member data
    $sql = "SELECT * FROM faculty WHERE ssn = $ssn";
    $result = $conn->query($sql);
    $facultyMember = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ssn = $_POST['ssn'];
    $facName = $_POST["facName"];
    $location = $_POST["location"];

    // Update faculty member
    $sql = "UPDATE faculty SET facName='$facName', location='$location' WHERE ssn=$ssn";
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
    <title>Edit Faculty Member</title>
</head>
<body>
    <h1>Edit Faculty Member</h1>

    <form action="" method="post">
        <input type="hidden" name="ssn" value="<?php echo $facultyMember['ssn']; ?>">
        <label for="facName">Faculty Name:</label>
        <input type="text" name="facName" value="<?php echo $facultyMember['facName']; ?>" required>
        <br>
        <br>
        <label for="location">Location:</label>
        <input type="text" name="location" value="<?php echo $facultyMember['location']; ?>" required>
        <br>
        <br>
        <input type="submit" value="Save Changes">
    </form>

    <a href="index.php">Back to Faculty List</a>
</body>
</html>
