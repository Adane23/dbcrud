<?php
include("../includes/db_connection.php");

// Read academic records
$sql = "SELECT * FROM academic";
$result = $conn->query($sql);
$academics = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Records List</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleindex.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <a href="../index.php">Back to Main Home</a>
    <h1>Academic Records List</h1>

    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>Enroll Date</th>
            <th>Grade</th>
            <th>Action</th>
        </tr>
        <?php foreach ($academics as $academic): ?>
            <tr>
                <td><?php echo $academic['studentID']; ?></td>
                <td><?php echo $academic['enrollDate']; ?></td>
                <td><?php echo $academic['grade']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $academic['studentID']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $academic['studentID']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="create.php">Add New Academic Record</a>
</body>
</html>
