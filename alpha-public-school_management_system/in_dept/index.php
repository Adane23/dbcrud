<?php
include("../includes/db_connection.php");

// Read employees in department
$sql = "SELECT * FROM in_Dept";
$result = $conn->query($sql);
$employeesInDept = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees in Department</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <a href="../index.php">Back to Main Home</a>
    <h1>Employees in Department</h1>

    <table border="1">
        <tr>
            <th>Employee SSN</th>
            <th>Manager SSN</th>
            <th>Department ID</th>
            <th>Action</th>
        </tr>
        <?php foreach ($employeesInDept as $employee): ?>
            <tr>
                <td><?php echo $employee['empSSN']; ?></td>
                <td><?php echo $employee['managerSSN']; ?></td>
                <td><?php echo $employee['deptID']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $employee['empSSN']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $employee['empSSN']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="create.php">Add New Employee in Department</a>
</body>
</html>
