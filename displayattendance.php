<?php
// Database connection
include_once("dbconnection.php");

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $employee_id = $_POST['employee_id'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    // Insert the attendance record into the database
    $query = "INSERT INTO attendance (employee_id, date, status) VALUES ('$employee_id', '$date', '$status')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $message = "Attendance logged successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Attendance</title>
    <link rel="stylesheet" href="css.css">
    <style>
        body { font-family: Arial, sans-serif; }
        .form-container { margin-bottom: 30px; }
        .message { margin-bottom: 20px; color: green; }
    </style>
</head>
<body>
    <h2>Log Employee Attendance</h2>
    

    <?php
    // Display success or error message if set
    if (isset($message)) {
        echo "<p class='message'>$message</p>";
    }
    ?>

    <!-- Attendance form -->
    <div class="form-container">
        <form action="" method="post">
            <label for="employee_id">Employee:</label>
            <select name="employee_id" required>
                <?php
                // Fetch all employees from the database
                $result = mysqli_query($conn, "SELECT id, First_Name, Last_Name FROM employee");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row['id']."'>".$row['First_Name']." ".$row['Last_Name']."</option>";
                }
                ?>
            </select><br>

            <label for="status">Attendance Status:</label>
            <select name="status" required>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
                <option value="Late">Late</option>
            </select><br>

            <label for="date">Date:</label>
            <input type="date" name="date" required><br>

            <input type="submit" name="submit" value="Log Attendance">
        </form>
    </div>

    <h2>Attendance Records</h2>

    <?php
    // Fetch attendance data from the database
    $query = "SELECT employee.First_Name, employee.Last_Name, attendance.date, attendance.status 
              FROM attendance 
              JOIN employee ON attendance.employee_id = employee.id 
              ORDER BY attendance.date DESC";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
                <tr>
                  <th>Employee Name</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['First_Name'] . " " . $row['Last_Name'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No attendance records found.";
    }
    ?>
</body>
</html>
