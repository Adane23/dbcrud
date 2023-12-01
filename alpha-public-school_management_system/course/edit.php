<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $courseID = $_GET['id'];

    // Fetch the course data
    $sql = "SELECT * FROM course WHERE courseID = $courseID";
    $result = $conn->query($sql);
    $course = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseID = $_POST['courseID'];
    $cName = $_POST["cName"];
    $creditHrs = $_POST["creditHrs"];

    // Update course
    $sql = "UPDATE course SET cName='$cName', creditHrs='$creditHrs' WHERE courseID=$courseID";
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
    <title>Edit Course</title>
</head>
<body>
    <h1>Edit Course</h1>

    <form action="" method="post">
        <input type="hidden" name="courseID" value="<?php echo $course['courseID']; ?>">
        <label for="cName">Course Name:</label>
        <input type="text" name="cName" value="<?php echo $course['cName']; ?>" required>
        <br>
        <br>
        <label for="creditHrs">Credit Hours:</label>
        <input type="text" name="creditHrs" value="<?php echo $course['creditHrs']; ?>" required>
        <br>
        <br>
        <input type="submit" value="Save Changes">
    </form>

    <a href="index.php">Back to Course List</a>
</body>
</html>
