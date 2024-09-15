<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the employee table
$result = mysqli_query($conn, "DELETE FROM employee WHERE id = $id");

// Check if the deletion was successful
if ($result) {
    // Redirect to the main display page (index.php in our case)
    header("Location: http://localhost/PHP/SIA/index.php");
    exit(); // Stop further script execution after redirection
} else {
    // Output the error if something goes wrong
    echo "Error: " . mysqli_error($conn);
}
?>
