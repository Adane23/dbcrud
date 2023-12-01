<?php
include("../includes/db_connection.php");

// Read courses
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
$courses = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course List</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <a href="../index.php">Back to Main Home</a>
    <h1>Course List</h1>

    <table border="1">
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Credit Hours</th>
            <th>Action</th>
        </tr>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?php echo $course['courseID']; ?></td>
                <td><?php echo $course['cName']; ?></td>
                <td><?php echo $course['creditHrs']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $course['courseID']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $course['courseID']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="create.php">Add New Course</a>
</body>
</html>
