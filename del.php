<?php
require_once 'functions.php';
$conn = dbconnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delEmployee($conn); // Assuming your delEmployee function takes the connection and id as parameters
    header('Location: index.php'); // Redirect after deletion
    exit;
}
?>
