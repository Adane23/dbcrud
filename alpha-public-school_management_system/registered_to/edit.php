<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['section'])) {
    $studentID = $_GET['id'];
    $sectionID = $_GET['section'];

    // Fetch the registration data
    $sql = "SELECT * FROM registered_to WHERE studentID = $studentID AND sectionID = $sectionID";
    $result = $conn->query($sql);
    $registration = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST['studentID'];
    $sectionID = $_POST['sectionID'];

    // Update registration
    $sql = "UPDATE registered_to SET sectionID='$sectionID' WHERE studentID=$studentID";
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
    <title>Edit Registration</title>
</head>
<body>
    <h1>Edit Registration</h1>

    <form action="" method="post">
        <input type="hidden" name="studentID" value="<?php echo $registration['studentID']; ?>">
        <label for="sectionID">Section ID:</label>
        <input type="text" name="sectionID" value="<?php echo $registration['sectionID']; ?>" required>
        <br>
        <br>
        <input type="submit" value="Save Changes">
    </form>

    <a href="index.php">Back to Registered Students List</a>
</body>
</html>
