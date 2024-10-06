<?php
require_once 'functions.php';
$conn = dbconnection();
addEmployee($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="css/stylesEmployee.css">
</head>
<body>

    <div class="sidebar">
        <img src="img/Test.png" alt="Logo" style="width: 100%; height: auto; margin-bottom: 20px;">
        <a href="homepage.php">Home</a>
        <a href="#">Employees</a>
        <a href="#">Attendance</a>
        <a href="#">Reports</a>
        <a href="index.php" onClick="return confirm('Are you sure you want to Logout?')">Log Out</a>
    </div>

    <h1>Add New Employee</h1>
    
    <!-- Form submission will post back to add.php -->
    <form action="add.php" method="post" enctype="multipart/form-data">
    <label for="Employee_ID">Employee ID:</label>
    <input type="text" name="Employee_ID" required><br>

    <label for="First_Name">First Name:</label>
    <input type="text" name="First_Name" required><br>

    <label for="Last_Name">Last Name:</label>
    <input type="text" name="Last_Name" required><br>

    <label for="Age">Age:</label>
    <input type="number" name="Age" required><br>

    <label for="E-mail">Email:</label>
    <input type="email" name="E-mail" required><br>

    <label for="Address">Address:</label>
    <textarea name="Address" required></textarea><br>

    <!-- File input for the image -->
    <label for="Image">Employee Image:</label>
    <input type="file" name="employee_img" accept="image/*"><br>

    <input type="submit" name="submit" value="Add Employee">
</form>

    </form> 
</body>
</html>
