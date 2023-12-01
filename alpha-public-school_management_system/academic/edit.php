<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $studentID = $_GET['id'];

    // Fetch the academic record data
    $sql = "SELECT * FROM academic WHERE studentID = $studentID";
    $result = $conn->query($sql);
    $academic = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST['studentID'];
    $enrollDate = $_POST["enrollDate"];
    $grade = $_POST["grade"];

    // Update academic record
    $sql = "UPDATE academic SET enrollDate='$enrollDate', grade='$grade' WHERE studentID=$studentID";
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
    <title>Edit Academic Record</title>
</head>
<body>
    <h1>Edit Academic Record</h1>

    <form action="" method="post">
        <input type="hidden" name="studentID" value="<?php echo $academic['studentID']; ?>">
        <label for="enrollDate">Enroll Date:</label>
        <input type="text" name="enrollDate" value="<?php echo $academic['enrollDate']; ?>" required>
        <br>
        <label for="grade">Grade:</label>
        <input type="text" name="grade" value="<?php echo $academic['grade']; ?>" required>
        <br>
        <input type="submit" value="Save Changes">
    </form>

    <a href="index.php">Back to Academic Records List</a>
</body>
</html>
