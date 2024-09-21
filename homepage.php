<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (latest entry first)
$result = mysqli_query($conn, "SELECT * FROM employee ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employ Employee</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to external CSS -->
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="img/Test.png" alt="Logo" style="width: 100%; height: auto; margin-bottom: 20px;">
        <a href="#">Home</a>
        <a href="#">Employees</a>
        <a href="#">Attendance</a>
        <a href="#">Reports</a>
        <a href="index.php" onClick="return confirm('Are you sure you want to Logout?')">Log Out</a>
    </div>

    <!-- Main content -->
    <div class="content">
        <h2>Employee List</h2>

        <!-- Employee table -->
        <table>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php
    while ($res = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$res['First_Name']." ".$res['Last_Name']."</td>";
        echo "<td>".$res['Age']."</td>";
        echo "<td>".$res['E-mail']."</td>";
        echo "<td>".$res['Address']."</td>"; 
        echo "<td>
            <a href='edit.php?id=".$res['id']."'>Edit</a> |
            <a href='del.php?id=".$res['id']."' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>
        </td>";
        echo "</tr>";
    }
    ?>
</table>

        <p class="Addbutton"><a class="add-button" href="add.php">Add New Employee</a></p>
    </div>

</body>
</html>
