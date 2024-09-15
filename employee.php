<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="stylesEmployee.css">
</head>
<body>

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employ Employee</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS -->
</head>
<body>

    <div class="sidebar">
        <img src="img/Test.png" alt="Logo" style="width: 100%; height: auto; margin-bottom: 20px;">
        <a href="index.php">Home</a>
        <a href="employee.php">Employees</a>
        <a href="#">Attendance</a>
        <a href="#">Reports</a>
        <a href="#">Log Out</a>
    </div>

    <h1>Add New Employee</h1>
    
    <form action="add_employee.php" method="POST">
        <label for="employee_id">Employee ID:</label>
        <input type="number" id="employee_id" name="employee_id" required><br><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <input type="submit" value="Add Employee">
    </form>

</body>
</html>
