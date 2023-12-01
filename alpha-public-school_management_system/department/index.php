<?php
include("../includes/db_connection.php");

// Read departments
$sql = "SELECT * FROM department";
$result = $conn->query($sql);
$departments = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department List</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <a href="../index.php">Back to Main Home</a>
    <h1>Department List</h1>

    <table border="1">
        <tr>
            <th>Department ID</th>
            <th>Department Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($departments as $department): ?>
            <tr>
                <td><?php echo $department['deptID']; ?></td>
                <td><?php echo $department['depName']; ?></td>
                <td><?php echo $department['email']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $department['deptID']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $department['deptID']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="create.php">Add New Department</a>
</body>
</html>
