<?php
include("../includes/db_connection.php");

// Read guardians
$sql = "SELECT * FROM guardian";
$result = $conn->query($sql);
$guardians = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardians List</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
</head>
<body>
    <a href="../index.php">Back to Main Home</a>
    <h1>Guardians List</h1>

    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Relation</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php foreach ($guardians as $guardian): ?>
            <tr>
                <td><?php echo $guardian['studentID']; ?></td>
                <td><?php echo $guardian['fName']; ?></td>
                <td><?php echo $guardian['mName']; ?></td>
                <td><?php echo $guardian['lName']; ?></td>
                <td><?php echo $guardian['email']; ?></td>
                <td><?php echo $guardian['relation']; ?></td>
                <td><?php echo $guardian['address']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $guardian['studentID']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $guardian['studentID']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="create.php">Add Guardian</a>
</body>
</html>
