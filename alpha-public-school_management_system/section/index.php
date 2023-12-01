<?php
include("../includes/db_connection.php");

// Read sections
$sql = "SELECT * FROM section";
$result = $conn->query($sql);
$sections = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section List</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <a href="../index.php">Back to Main Home</a>
    <h1>Section List</h1>

    <table border="1">
        <tr>
            <th>Section ID</th>
            <th>Teacher ID</th>
            <th>Course ID</th>
            <th>Action</th>
        </tr>
        <?php foreach ($sections as $section): ?>
            <tr>
                <td><?php echo $section['sectionID']; ?></td>
                <td><?php echo $section['teacherID']; ?></td>
                <td><?php echo $section['courseID']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $section['sectionID']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $section['sectionID']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="create.php">Add New Section</a>
</body>
</html>
