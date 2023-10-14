<?php
require 'connection.php'; // Include your database connection file
session_start(); // Start the session

if(isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $updateStatusQuery = "UPDATE users SET status='inactive' WHERE id='$userId'";
    mysqli_query($con, $updateStatusQuery) or die(mysqli_error($con));
}

// Unset and destroy the session
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="images/coffee.png" />
        <title>logout form |</title>
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
                  <section class="home" id="home">

<div class="container">

   <div class="row align-items-center text-center text-md-left min-vh-100">
      <div class="col-md-6">
         <span>coffee house</span>
         <h3>start your day with our coffee</h3>
         <a href="#" class="link-btn">get started</a>
      </div>
   </div>

</div>

</section>
<div class="login-form active">
<form action="index.php" >
   <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>
   <h3>You have been logged out.!</h3>
   
  
   <input type="submit" value="back to home" class="link-btn">
   <p class="account">don't have an account? <a href="login.php">login again</a></p>

</form>

</div>

    

<footer style="background-color:#512a10;">
        <div class="container" style="color:#512a10;font-size: 80px; padding: 80px 0;" align="center">
        <a style="color:white ;" href="#" class="fab fa-facebook-f"></a>
   <a style="color:white ;" href="#" class="fab fa-linkedin"></a>
   <a style="color:white ;" href="#" class="fab fa-twitter"></a>
   <a style="color:white ;" href="#" class="fab fa-github"></a>
        </div>
        <div>
            <p style="color: black; padding: 15px 0;" align="center">
                &copy; 2023 Copyright: <a style="color:white ;"  href="#">>ahmed Khlif | all rights reserved! </a>
            </p>
        </div>
    </footer>
           
        </div>
    </body>
</html>
