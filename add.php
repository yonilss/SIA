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
    <link rel="stylesheet" href="css/add.css">
</head>
<body>
    <div class="sidebar">
        <img src="img/EMSLOGO.png" alt="Logo" style="width: 100%; height: auto; margin-bottom: 20px;">
        <a href="home.php">Home</a>
        <a href="employee.php">Employees</a>
        <a href="#">Attendance</a>
        <a href="#">Reports</a>
        <a href="index.php" onClick="return confirm('Are you sure you want to Logout?')">Log Out</a>
    </div>

    <div class="content">
        <h1>Add New Employee</h1>
        
        <form action="add.php" method="post" enctype="multipart/form-data" class="employee-form">
    <div class="form-group">
        <div class="form-field">
            <label for="Employee_ID">Employee ID:</label>
            <input type="number" name="Employee_ID" required>
        </div>
        <div class="form-field">
            <label for="First_Name">First Name:</label>
            <input type="text" name="First_Name" required>
        </div>
    </div>

    <div class="form-group">
        <div class="form-field">
            <label for="Last_Name">Last Name:</label>
            <input type="text" name="Last_Name" required>
        </div>
        <div class="form-field">
            <label for="Age">Age:</label>
            <input type="number" name="Age" required>
        </div>
    </div>

    <div class="form-group">
        <div class="form-field">
            <label for="E-mail">Email:</label>
            <input type="email" name="E-mail" required>
        </div>
    </div>

    <div class="form-group">
        <div class="form-field">
            <label for="Address">Address:</label>
            <textarea name="Address" required></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="form-field">
            <label for="Image">Employee Image:</label>
            <input type="file" name="employee_img" accept="image/*">
        </div>
    </div>

    <input type="submit" name="submit" value="Add Employee" class="submit-btn">
</form>


    </div>
    
</body>
</html>
