<?php
    require 'connection.php';
    session_start();
    if(isset($_SESSION['email'])){
        header('location: products.php');
    }
?>
<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="images/coffee.png" />
        <title>signup form |</title>
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
<form method="post" action="user_registration_script.php">
   <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>
   <h3>let's start a new great day SIGN UP</h3>
   <input type="text"  name="name" placeholder="Name" required="true"  class="box">
   <input type="email"  name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  class="box">
   <input type="password"  name="password" placeholder="Password(min. 6 characters)" required="true" pattern=".{6,}" class="box">
   <input type="tel"  name="contact" placeholder="Contact" required="true" class="box">
   <input type="text"  name="city" placeholder="City" required="true"  class="box">
   <input type="text"  name="address" placeholder="Address" required="true"  class="box">

   <div class="flex">
      <input type="checkbox" name="" id="remember-me"  >
      <label for="remember-me">Confirme?</label>
      <br/>
      <center>
      <input type="submit" value="Sign Up" class="link-btn">
      </center>
   </div>
</form>

</div>
           

        </div>
    </body>
</html>
