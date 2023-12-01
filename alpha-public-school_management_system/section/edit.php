<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $sectionID = $_GET['id'];

    // Fetch the section data
    $sql = "SELECT * FROM section WHERE sectionID = $sectionID";
    $result = $conn->query($sql);
    $section = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sectionID = $_POST['sectionID'];
    $teacherID = $_POST["teacherID"];
    $courseID = $_POST["courseID"];

    // Update section
    $sql = "UPDATE section SET teacherID='$teacherID', courseID='$courseID' WHERE sectionID=$sectionID";
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
    <title>Edit Section</title>
</head>
<body>
    <h1>Edit Section</h1>

    <form action="" method="post">
        <input type="hidden" name="sectionID" value="<?php echo $section['sectionID']; ?>">
        <label for="teacherID">Teacher ID:</label>
        <input type="text" name="teacherID" value="<?php echo $section['teacherID']; ?>" required>
        <br>
        <br>
        <label for="courseID">Course ID:</label>
        <input type="text" name="courseID" value="<?php echo $section['courseID']; ?>" required>
        <br>
        <br>
        <input type="submit" value="Save Changes">
    </form>

    <a href="index.php">Back to Section List</a>
</body>
</html>
