<?php
function dbconnection(){
    $servername = "localhost";
    $username = "root";  
    $password = "";     
    $dbname = "EMS"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function login($conn){
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        print_r($_POST); // Debugging to see if data is received
        
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            
            // Direct comparison (not secure, just for testing)
            $query = "SELECT * FROM accounts WHERE email = '$email'";
            $result = mysqli_query($conn, $query);
        
            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);
                
                // Simple comparison (not hashed)
                if ($password === $user['Password']) {
                    $_SESSION['email'] = $user['Email'];
                    header('Location: homepage.php');
                    exit;
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "Invalid email.";
            }
        } else {
            echo "Email or password not set.";
        }
    }
}

function addEmployee($conn){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $employee_id = $_POST['employee_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $address = $_POST['address'];
    
        $conn = require_once "dbConnection.php";
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $sql = "INSERT INTO employee (Employee_ID, First_Name, Last_Name, Age, `E-mail`, Address) 
                VALUES ('$employee_id', '$first_name', '$last_name', '$age', '$email', '$address')";
    
        if ($conn->query($sql) === TRUE) {
            echo "New employee added successfully!";
            header("Location: http://localhost/PHP/SIA/homepage.php");
    
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
}

function editEmployee($conn){
    if (isset($_POST['update'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
    
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
            $result = mysqli_query($conn, "UPDATE employee SET 
                Employee_ID = '$employee_id', 
                First_Name = '$first_name', 
                Last_Name = '$last_name', 
                Age = '$age', 
                `E-mail` = '$email', 
                Address = '$address' 
                WHERE id = '$id'");
    
            if ($result) {
                echo "<p><font color='green'>Data updated successfully!</font></p>";
                echo "<a href='homepage.php'>View Result</a>";
            } else {
                echo "<p><font color='red'>Error updating data: " . mysqli_error($conn) . "</font></p>";
            }
        }
    }
}

function delEmployee($conn){
    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM employee WHERE id = $id");

    if ($result) {
    header("Location: http://localhost/PHP/SIA/homepage.php");
    exit();
        } else {
    echo "Error: " . mysqli_error($conn);
        }
    }
?>
