<?php
require 'connection.php';
session_start();

// Ensure user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: /projaa/login.php");
    exit();
}

$user_id = $_SESSION['id'];

// Process form submission and update user details including password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);

    // Update user details in the database
    $update_query = "UPDATE users SET name='$name', email='$email', contact='$contact' WHERE id='$user_id'";
    mysqli_query($con, $update_query) or die(mysqli_error($con));

    // Check if a new password is provided
    if (!empty($_POST['newPassword'])) {
        $currentPassword = md5(md5(mysqli_real_escape_string($con, $_POST['currentPassword'])));
        $newPassword = md5(md5(mysqli_real_escape_string($con, $_POST['newPassword'])));
        $confirmPassword = md5(md5(mysqli_real_escape_string($con, $_POST['confirmPassword'])));

        // Verify the current password before updating
        $checkPasswordQuery = "SELECT * FROM users WHERE id='$user_id' AND password='$currentPassword'";
        $checkPasswordResult = mysqli_query($con, $checkPasswordQuery) or die(mysqli_error($con));
        $rows_fetched_password = mysqli_num_rows($checkPasswordResult);

        if ($rows_fetched_password == 0) {
            // Display an error message if the current password is incorrect
            header("Location: /projaa/profile.php?error=1");
            exit();
        }

        // Update the password in the database
        $updatePasswordQuery = "UPDATE users SET password='$newPassword' WHERE id='$user_id'";
        mysqli_query($con, $updatePasswordQuery) or die(mysqli_error($con));
    }

    // Redirect back to the profile page with a success message
    header("Location: /projaa/profile.php?success=1");
    exit();
} else {
    // Redirect to the profile page
    header("Location: /projaa/profile.php");
    exit();
}
?>
