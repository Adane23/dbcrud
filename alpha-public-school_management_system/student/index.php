<?php
include("../includes/db_connection.php");

// Read students
$sql = "SELECT * FROM student";
$result = $conn->query($sql);
$students = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <a href="../index.php">Back to Main Home</a>
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <h1>Student List</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student['studentID']; ?></td>
                <td><?php echo $student['fName']; ?></td>
                <td><?php echo $student['mName']; ?></td>
                <td><?php echo $student['lName']; ?></td>
                <td><?php echo $student['DoB']; ?></td>
                <td><?php echo $student['address']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $student['studentID']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $student['studentID']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="create.php">Add New Student</a>
</body>
</html>
