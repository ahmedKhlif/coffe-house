<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['email'])) {
    header('location: index.php');
    exit(); // Stop script execution after redirection
}

$user_id = $_GET['id'];

// Update the status of items to 'Confirmed' for the user
$confirm_query = "UPDATE users_items SET status='Confirmed' WHERE user_id=$user_id";
$confirm_query_result = mysqli_query($con, $confirm_query) or die(mysqli_error($con));

// Retrieve item IDs from users_items table for the user
$item_ids_query = "SELECT item_id FROM users_items WHERE user_id = '$user_id'";
$item_ids_result = mysqli_query($con, $item_ids_query);
while ($row = mysqli_fetch_assoc($item_ids_result)) {
    $item_id = $row['item_id'];

    // Decrease the quantity of the item in the items table by 1
    mysqli_query($con, "UPDATE items SET quantity = quantity - 1 WHERE id = '$item_id' AND quantity > 0");
}

?>
<!DOCTYPE html>
<html>
    <head>
  
    <link rel="shortcut icon" href="images/coffee.png" />
        <title>success form |</title>
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
.nav2 ,.nav4,.nav5,.nav6,.nav7{
  display: none;
}
</style>
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
   <h3>You have been shopping with us.!</h3>
   
  
   <input type="submit" value="back to home" class="link-btn">
   <p>Your order is confirmed <a href="products.php">Click here</a> to purchase any other item.</p>
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
                &copy; 2023 Copyright: <a style="color:white ;"  href="#">>bouthy and ahmed ♥ | all rights reserved! </a>
            </p>
        </div>
    </footer>











    </body>
</html>
