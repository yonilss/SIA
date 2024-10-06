<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (latest entry first)
$result = mysqli_query($conn, "SELECT * FROM employee ORDER BY Employee_ID ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to external CSS -->
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="img/Test.png" alt="Logo" style="width: 100%; height: auto; margin-bottom: 20px;">
        <a href="homepage.php">Home</a>
        <a href="employee.php">Employees</a>
        <a href="#">Attendance</a>
        <a href="#">Reports</a>
        <a href="index.php" onClick="return confirm('Are you sure you want to Logout?')">Log Out</a>
    </div>

    <!-- Main content -->
    <div class="content">
        <h2>Welcome to Employ Employee</h2>

</body>
</html>
