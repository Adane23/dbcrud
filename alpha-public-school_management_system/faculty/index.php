<?php
include("../includes/db_connection.php");

// Read faculty members
$sql = "SELECT * FROM faculty";
$result = $conn->query($sql);
$facultyMembers = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty List</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <a href="../index.php">Back to Main Home</a>
    <h1>Faculty List</h1>

    <table border="1">
        <tr>
            <th>SSN</th>
            <th>Faculty Name</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        <?php foreach ($facultyMembers as $faculty): ?>
            <tr>
                <td><?php echo $faculty['ssn']; ?></td>
                <td><?php echo $faculty['facName']; ?></td>
                <td><?php echo $faculty['location']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $faculty['ssn']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $faculty['ssn']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="create.php">Add New Faculty Member</a>
</body>
</html>
