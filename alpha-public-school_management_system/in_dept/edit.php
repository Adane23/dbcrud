<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $empSSN = $_GET['id'];

    // Fetch the employee in department data
    $sql = "SELECT * FROM in_Dept WHERE empSSN = $empSSN";
    $result = $conn->query($sql);
    $employeeInDept = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empSSN = $_POST['empSSN'];
    $managerSSN = $_POST["managerSSN"];
    $deptID = $_POST["deptID"];

    // Update employee in department
    $sql = "UPDATE in_Dept SET managerSSN='$managerSSN', deptID='$deptID' WHERE empSSN=$empSSN";
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
    <title>Edit Employee in Department</title>
</head>
<body>
    <h1>Edit Employee in Department</h1>

    <form action="" method="post">
        <input type="hidden" name="empSSN" value="<?php echo $employeeInDept['empSSN']; ?>">
        <label for="managerSSN">Manager SSN:</label>
        <input type="text" name="managerSSN" value="<?php echo $employeeInDept['managerSSN']; ?>" required>
        <br>
        <br>
        <label for="deptID">Department ID:</label>
        <input type="text" name="deptID" value="<?php echo $employeeInDept['deptID']; ?>" required>
        <br>
        <br>
        <input type="submit" value="Save Changes">
    </form>

    <a href="index.php">Back to Employees in Department List</a>
</body>
</html>
