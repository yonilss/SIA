<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $employee_id = $_POST['employee_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Include the database connection
    $conn = require_once "dbConnection.php"; // This will return the connection object

    // Check connection (this is redundant since dbConnection.php already handles it)
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the employee table
    $sql = "INSERT INTO employee (Employee_ID, First_Name, Last_Name, Age, `E-mail`, Address) 
            VALUES ('$employee_id', '$first_name', '$last_name', '$age', '$email', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "New employee added successfully!";
        header("Location: http://localhost/PHP/SIA/index.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
