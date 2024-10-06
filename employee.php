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
    <title>Employ Employee</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to external CSS -->
    <style>
        .employee-card {
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 16px;
    margin: 16px;
    width: 300px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    text-align: center;
    display: inline-block;
    vertical-align: top;
}

.employee-img {
    width: 100%;         /* Make sure the image fills the card width */
    height: 250px;       /* Set a fixed height for all images */
    object-fit: cover;   /* Crop the image if necessary while maintaining aspect ratio */
    border-radius: 8px;  /* Optional: If you want rounded corners */
}

.employee-details {
    padding: 8px 0;
}

.employee-details h2 {
    font-size: 1.5em;
    margin: 8px 0;
}

.employee-details p {
    font-size: 1em;
    margin: 4px 0;
}

.employee-actions {
    margin-top: 8px;
}

.edit-btn, .delete-btn {
    text-decoration: none;
    color: white;
    background-color: #007BFF;
    padding: 8px 12px;
    border-radius: 4px;
}

.delete-btn {
    background-color: #DC3545;
}

.edit-btn:hover, .delete-btn:hover {
    opacity: 0.8;
}

    </style>
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
        <h2>Employee List</h2>

        <?php
while ($res = mysqli_fetch_assoc($result)) {
    echo "<div class='employee-card'>";

    // Display the uploaded image (if available)
    if (!empty($res['Image'])) {
        echo "<img src='img/".$res['Image']."' alt='Employee Image' class='employee-img'>";
    } else {
        echo "<img src='images/default.jpg' alt='Default Image' class='employee-img'>"; // Default image if no image uploaded
    }

    // Employee information
    echo "<div class='employee-details'>";
    echo "<h2>".$res['First_Name']." ".$res['Last_Name']."</h2>";
    echo "<p>Employee ID: ".$res['Employee_ID']."</p>";
    echo "<p>Age: ".$res['Age']."</p>";
    echo "<p>Email: ".$res['E-mail']."</p>";
    echo "<p>Address: ".$res['Address']."</p>";

    // Edit and Delete links
    echo "<div class='employee-actions'>";
    echo "<a href='edit.php?id=".$res['id']."' class='edit-btn'>Edit</a>";
    echo " | ";
    echo "<a href='del.php?id=".$res['id']."' class='delete-btn' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>";
    echo "</div>"; // employee-actions
    
    echo "</div>"; // employee-details
    echo "</div>"; // employee-card
}
?>

</table>

        <p class="Addbutton"><a class="add-button" href="add.php">Add New Employee</a></p>
    </div>

</body>
</html>
