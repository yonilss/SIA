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
    <style>
        /* Set the background color to black */
        body {
            margin: 0;
            padding: 0;
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            height: 100vh; /* Full viewport height */
            background-color: #333;
            padding: 20px;
            position: fixed; /* Fixed sidebar */
            top: 0;
            left: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        }

        /* Links inside the sidebar */
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border: 2px solid white; /* Add white border */
            margin-bottom: 10px; /* Space between links */
            text-align: center; /* Center align text */
            transition: background-color 0.3s ease;
        }

        /* Hover effect for links */
        .sidebar a:hover {
            background-color: #555;
        }

        /* Main content styling */
        .content {
            margin-left: 270px; /* Space for the sidebar */
            padding: 20px;
        }

        /* Table styling */
        table {
            width: 80%;
            margin: 20px auto; /* Center horizontally */
            border-collapse: collapse;
            background-color: #222;
            color: white;
            margin-left: 70px; /* Adjust this value to move it further right */
        }

        table th, table td {
            border: 1px solid white;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #444;
        }

        table tr:hover {
            background-color: #555;
        }

        /* Add New Employee button styling */
        .add-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        .Addbutton, h2{
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="img/Test.png" alt="Logo" style="width: 100%; height: auto; margin-bottom: 20px;">
        <a href="#">Home</a>
        <a href="employee.php">Employees</a>
        <a href="#">Attendance</a>
        <a href="#">Reports</a>
        <a href="#">Log Out</a>
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
                <th>Action</th>
            </tr>
            <?php
            // Fetch the next row of a result set as an associative array
            while ($res = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$res['First_Name']." ".$res['Last_Name']."</td>";
                echo "<td>".$res['Age']."</td>";
                echo "<td>".$res['E-mail']."</td>";
                echo "<td>
                    <a href='edit.php?id=".$res['id']."'>Edit</a> |
                    <a href='del_employee.php?id=".$res['id']."' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>
                </td>";
                echo "</tr>";
                
            }
            
            ?>
            
        </table>
        <p class=Addbutton><a class="add-button" href="employee.php">Add New Employee</a></p>
    </div>

</body>
</html>
