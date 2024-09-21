<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter and ensure it's an integer
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Prepare the SQL query to select user data
    $result = mysqli_query($conn, "SELECT * FROM employee WHERE id = $id");

    // Check if data was found
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the data as an associative array
        $resultData = mysqli_fetch_assoc($result);

        // Assign the values from the database to variables
        $employee_id = $resultData['Employee_ID'];
        $first_name = $resultData['First_Name'];
        $last_name = $resultData['Last_Name'];
        $age = $resultData['Age'];
        $email = $resultData['E-mail'];
        $address = $resultData['Address'];
    } else {
        echo "No user found with the provided ID.";
        exit;
    }
} else {
    echo "Invalid ID.";
    exit;
}
?>

<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h2>Edit Data</h2>
    <p>
        <a href="index.php">Home</a>
    </p>
    <form name="edit" method="post" action="edit_employee.php">
        <table border="0">
            <tr>
                <td>Employee ID</td>
                <td><input type="text" name="employee_id" value="<?php echo htmlspecialchars($employee_id); ?>" readonly></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo htmlspecialchars($age); ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="address"><?php echo htmlspecialchars($address); ?></textarea></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
