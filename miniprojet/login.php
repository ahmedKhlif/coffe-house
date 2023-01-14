<?php
    require 'connection.php';
    session_start();
?>
<!DOCTYPE html>
<html>
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
<form method="post" action="login_submit.php">
   <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>
   <h3>let's start a new great day</h3>
   <input type="email" name="email" placeholder="type your Email !" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="" class="box">
   <input type="password" name="password"  placeholder=" type your Password(min. 6 characters)" pattern=".{6,}" id="" class="box">
   <div class="flex">
      <input type="checkbox" name="" id="remember-me">
      <label for="remember-me">remember me</label>
      <a href="#">forgot password?</a>
   </div>
   <input type="submit" value="login now" class="link-btn">
   <p class="account">don't have an account? <a href="signup.php">Register</a></p>
</form>

</div>
           


        </div>
    </body>
</html>
