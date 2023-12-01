<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $deptID = $_GET['id'];

    // Fetch the department data
    $sql = "SELECT * FROM department WHERE deptID = $deptID";
    $result = $conn->query($sql);
    $department = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deptID = $_POST['deptID'];
    $deptName = $_POST["deptName"];
    $email = $_POST["email"];

    // Update department
    $sql = "UPDATE department SET depName='$deptName', email='$email' WHERE deptID=$deptID";
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
    <title>Edit Department</title>
</head>
<body>
    <h1>Edit Department</h1>

    <form action="" method="post">
        <input type="hidden" name="deptID" value="<?php echo $department['deptID']; ?>">
        <label for="deptName">Department Name:</label>
        <input type="text" name="deptName" value="<?php echo $department['depName']; ?>" required>
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $department['email']; ?>">
        <br>
        <br>
        <input type="submit" value="Save Changes">
    </form>

    <a href="index.php">Back to Department List</a>
</body>
</html>
