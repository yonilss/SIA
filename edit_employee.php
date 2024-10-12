<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
    // Escape special characters in a string for use in an SQL statement
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Check for empty fields
    if (empty($employee_id) || empty($first_name) || empty($last_name) || empty($age) || empty($email) || empty($address)) {
        if (empty($employee_id)) {
            echo "<font color='red'>Employee ID field is empty.</font><br/>";
        }
        if (empty($first_name)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
        if (empty($last_name)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }
        if (empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if (empty($address)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        }
    } else {
        // Update the database table
        $result = mysqli_query($conn, "UPDATE employee SET 
            Employee_ID = '$employee_id', 
            First_Name = '$first_name', 
            Last_Name = '$last_name', 
            Age = '$age', 
            `E-mail` = '$email', 
            Address = '$address' 
            WHERE id = '$id'");

        // Check if the query was successful
        if ($result) {
            // Display success message
            header('Location: home.php'); // Redirect after deletion
        } else {
            echo "<p><font color='red'>Error updating data: " . mysqli_error($mysqli) . "</font></p>";
        }
    }
}
?>
