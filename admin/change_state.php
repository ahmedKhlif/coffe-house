<?php
include('connection.php');
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
  // If the user is not logged in or not an admin, display an error message
  echo "Access Denied. You do not have permission to access this page.";
  header("Location: /projaa/index.php"); // Redirect to client 
  exit();
}

if(isset($_GET['id'])) {
    $userId = $_GET['id'];
    // Toggle user state between 'active' and 'inactive'
    $selectQuery = "SELECT state FROM users WHERE id = $userId";
    $result = mysqli_query($con, $selectQuery);
    $row = mysqli_fetch_assoc($result);
    $newState = ($row['state'] == 'active') ? 'inactive' : 'active';

    $updateQuery = "UPDATE users SET state = '$newState' WHERE id = $userId";
    mysqli_query($con, $updateQuery);
    header('Location: users.php');
}
?>
