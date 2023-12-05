<?php
require 'connection.php';
session_start();
$email = mysqli_real_escape_string($con, $_POST['email']);
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
$message = '';
$class = '';

if (!preg_match($regex_email, $email)) {
    $message = "Incorrect email. Please enter a valid email address.";
    $class = "danger";
} else {
    $password = md5(md5(mysqli_real_escape_string($con, $_POST['password'])));
    
    if (strlen($password) < 6) {
        $message = "Password should have at least 6 characters.";
        $class = "danger";
    } else {
        $user_authentication_query = "SELECT id, email, role FROM users WHERE email='$email' AND password='$password'";
        $user_authentication_result = mysqli_query($con, $user_authentication_query) or die(mysqli_error($con));
        $rows_fetched = mysqli_num_rows($user_authentication_result);

        if ($rows_fetched == 0) {
            $message = "Wrong username or password. Please try again.";
            $class = "danger";
        } else {
            $row = mysqli_fetch_array($user_authentication_result);
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $row['id'];  // User id
            
            // Update last_login and set status to 'Active'
            $updateLastLoginQuery = "UPDATE users SET last_login = NOW(), status = 'Active' WHERE id = " . $row['id'];
            mysqli_query($con, $updateLastLoginQuery);
            $message = "Login successful.";

            // Set user role in session
            $_SESSION['role'] = $row['role'];

            // Redirect based on user role
            if ($_SESSION['role'] == 'admin') {
                header("Location: /projaa/admin");
            } else {
                header("Location: /projaa/profile.php");
            }
            exit();
        }
    }
}

// Display Bootstrap-styled toast covering the entire width at the top
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <style>
        /* Your custom styles for toast notifications */
    </style>
</head>
<body>
    <div id="customToast" class="alert alert-$class" role="alert">
        $message
    </div>

    <script>
        // Hide the toast after 2 seconds and redirect based on the result
        setTimeout(function() {
            document.getElementById('customToast').style.display = 'none';
            window.location.href = ('$class' === 'danger') ? 'login.php' : 'index.php';
        }, 2000);
    </script>
</body>
</html>
HTML;
?>
