<?php
include("../includes/db_connection.php");

// Read registered students
$sql = "SELECT * FROM registered_to";
$result = $conn->query($sql);
$registrations = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students List</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <a href="../index.php">Back to Main Home</a>
    <h1>Registered Students List</h1>

    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>Section ID</th>
            <th>Action</th>
        </tr>
        <?php foreach ($registrations as $registration): ?>
            <tr>
                <td><?php echo $registration['studentID']; ?></td>
                <td><?php echo $registration['sectionID']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $registration['studentID']; ?>&section=<?php echo $registration['sectionID']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $registration['studentID']; ?>&section=<?php echo $registration['sectionID']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="create.php">Register a Student to a Section</a>
</body>
</html>
