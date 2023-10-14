<?php
include('connection.php');
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
  // If the user is not logged in or not an admin, display an error message
  echo "Access Denied. You do not have permission to access this page.";
  header("Location: /projaa/index.php"); // Redirect to client 
  exit();
}

if(isset($_GET['id'])) {
    $userId = $_GET['id'];
    $deleteQuery = "DELETE FROM users WHERE id = $userId";
    mysqli_query($con, $deleteQuery);
    header('Location: users.php');
}
?>
