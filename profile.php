<?php
require 'connection.php';
session_start();

// Ensure user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: /projaa/login.php");
    exit();
}

$user_id = $_SESSION['id'];
$user_query = "SELECT * FROM users WHERE id='$user_id'";
$user_result = mysqli_query($con, $user_query) or die(mysqli_error($con));
$user = mysqli_fetch_assoc($user_result);

// Display user details and options for modification
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <head>
    <link rel="shortcut icon" href="images/coffee.png" />
        <title>login form |</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
           <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- bootstrap cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <script defer src="script.js"></script>
  <style>
    header {
      background-color:#512a10;
      
    } 
    .home {
      
  background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url(/images/home-bg.jpg) no-repeat;
  background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(images/home-bg.jpg) no-repeat;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}

  </style>
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
</head>
<body>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2>User Profile</h2>
                    </div>
                    <div class="card-body">
                        <!-- Display user details -->
                        <form method="post" action="update_profile.php">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact:</label>
                                <input type="text" class="form-control" id="contact" name="contact" value="<?= $user['contact'] ?>" required>
                            </div>

                            <!-- Display change password section -->
                            <hr>
                            <h2>Change Password</h2>
                            <div class="form-group">
                                <label for="currentPassword">Current Password:</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                            </div>
                            <div class="form-group">
                                <label for="newPassword">New Password:</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm New Password:</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
