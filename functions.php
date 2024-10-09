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
        $employee_id = $_POST['Employee_ID'];
    $first_name = $_POST['First_Name'];
    $last_name = $_POST['Last_Name'];
    $age = $_POST['Age'];
    $email = $_POST['E-mail'];
    $address = $_POST['Address'];

    // Handle image upload
    $target_dir = "img/"; // Directory to store images
    $image_file = $target_dir . basename($_FILES["employee_img"]["name"]); // Image file path

    // Check if the file is an actual image or fake image
    $check = getimagesize($_FILES["employee_img"]["tmp_name"]);
    if ($check !== false) {
        // Upload the file
        if (move_uploaded_file($_FILES["employee_img"]["tmp_name"], $image_file)) {
            // Insert employee data along with image file name into the database
            $query = "INSERT INTO employee (Employee_ID, First_Name, Last_Name, Age, `E-mail`, Address, Image) 
                      VALUES ('$employee_id', '$first_name', '$last_name', '$age', '$email', '$address', '".basename($_FILES["employee_img"]["name"])."')";

            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "Employee added successfully!";
                header("Location: employee.php");

            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading the image.";
        }
    } else {
        echo "File is not an image.";
    }

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
    header("Location: employee.php");
    exit();
        } else {
    echo "Error: " . mysqli_error($conn);
        }
    }
?>
