<?php
session_start();


// Include the database connection file
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Insert data into the contact_form table
    $sql = "INSERT INTO contact_form (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="images/coffe.png" />
        <title>coffe home |</title>
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
      
           <?php
            require 'header.php';
           ?>
    
    <section class="home" id="home">

<div class="container">

   <div class="row align-items-center text-center text-md-left min-vh-100">
      <div class="col-md-6">
         <h3>start your day with our coffee</h3>
         <a href="#" class="link-btn">get started</a>
      </div>
   </div>

</div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

<div class="container">

   <div class="row align-items-center">
      <div class="col-md-6">
         <img src="images/about-img-1.png" class="w-100" alt="">
      </div>
      <div class="col-md-6">
         <span>why choose us?</span>
         <h3 class="title">the best coffee maker in the town</h3>
         <p>Coffee Shop are genuinely interesting, in quality and flavor, as well as the main coffees developed and created in the United States. Perfect climatic conditions – temperature, stickiness, elevation  and rich volcanic soil empowers Hawaiian ranchers to deliver the worlds best coffees, among them the all around prestigious Kona coffee.</p>
         <a href="#" class="link-btn">read more</a>
         <div class="icons-container">
            <div class="icons">
               <i class="fas fa-coffee"></i>
               <h3>best coffee</h3>
            </div>
            <div class="icons">
               <i class="fas fa-shipping-fast"></i>
               <h3>free delivery</h3>
            </div>
            <div class="icons">
               <i class="fas fa-headset"></i>
               <h3>24/7 service</h3>
            </div>
         </div>
      </div>
   </div>

</div>

</section>

<!-- about section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

<h1 class="heading"> our gallery </h1>

<div class="box-container container">

   <div class="box">
      <img src="images/g-img-1.jpg" alt="">
      <div class="content">
         <h3>morning coffee</h3>
         <p>Coffee addiction, you say. Well, my friend, you've never met me without coffee</p>
         <a href="#" class="link-btn">read more</a>
      </div>
   </div>

   <div class="box">
      <img src="images/g-img-2.jpg" alt="">
      <div class="content">
         <h3>morning coffee</h3>
         <p>Morning coffee and friends are the true pleasures in life.</p>
         <a href="#" class="link-btn">read more</a>
      </div>
   </div>

   <div class="box">
      <img src="images/g-img-3.jpg" alt="">
      <div class="content">
         <h3>morning coffee</h3>
         <p>Only a good friend knows exactly what you like in your coffee.</p>
         <a href="#" class="link-btn">read more</a>
      </div>
   </div>

   <div class="box">
      <img src="images/g-img-4.jpg" alt="">
      <div class="content">
         <h3>morning coffee</h3>
         <p>Coffee and friends are treasures that go together.</p>
         <a href="#" class="link-btn">read more</a>
      </div>
   </div>

   <div class="box">
      <img src="images/g-img-5.jpg" alt="">
      <div class="content">
         <h3>morning coffee</h3>
         <p>A great cup of coffee and the ears of a good friend are the best kind of therapy.</p>
         <a href="#" class="link-btn">read more</a>
      </div>
   </div>

   <div class="box">
      <img src="images/g-img-6.jpg" alt="">
      <div class="content">
         <h3>morning coffee</h3>
         <p>Make it better. Have a cup of coffee.</p>
         <a href="#" class="link-btn">read more</a>
      </div>
   </div>

</div>

</section>

<!-- gallery section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

<h1 class="heading">OUR team work </h1>

<div class="box-container container">


   <div class="box">
      <img src="images/pic2.jpg" alt="">
      <h3>ahmed khlif</h3>
      <p>iset sfax university student</p>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
      </div>
   </div>
</div>

</section>

<!-- reviews section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

<h1 class="heading"> contact us  </h1>

<div class="container">

   <div class="contact-info-container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone</h3>
         <p>+216 94 272 455</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email</h3>
         <p>khlifahmed1@gmail.com</p>
         <p></p>
      </div>

      <div class="box">
         <i class="fas fa-map"></i>
         <h3>address</h3>
         <p>rue de tunis km 10.5</p>
      </div>

   </div>

   <div class="row align-items-center">

      <div class="col-md-6 mb-5 mb-md-0 ">
      <iframe  class="map w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3277.935773641965!2d10.769960951029782!3d34.757210680323915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1301d2c1f3c2991f%3A0xab7f8817c80e9617!2sISET%20Sfax!5e0!3m2!1sfr!2stn!4v1671361723600!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <form action="" class="col-md-6" method="post"> <!-- added method="post" to specify the form submission method -->
    <h3>get in touch</h3>
    <input type="text" placeholder="your name" class="box" name="name"> <!-- added name attribute -->
    <input type="email" placeholder="email" class="box" name="email"> <!-- added name attribute -->
    <input type="tel" placeholder="phone" class="box" name="phone"> <!-- changed type to tel and added name attribute -->
    <textarea name="message" placeholder="message" class="box" id="" cols="30" rows="10"></textarea> <!-- added name attribute -->
    <input type="submit" value="send message" class="link-btn">
</form>


   </div>

</div>

</section>

<!-- contact section ends -->


<!-- newsletter section starts  -->


<!-- newsletter section ends -->

<!-- footer section starts  -->




   <footer style="background-color:#512a10;">
        <div class="container" style="color:#512a10;font-size: 80px; padding: 80px 0;" align="center">
        <a style="color:white ;" href="#" class="fab fa-facebook-f"></a>
   <a style="color:white ;" href="#" class="fab fa-linkedin"></a>
   <a style="color:white ;" href="#" class="fab fa-twitter"></a>
   <a style="color:white ;" href="#" class="fab fa-github"></a>
        </div>
        <div>
            <p style="color: black; padding: 15px 0;" align="center">
                &copy; 2023 Copyright: <a style="color:white ;"  href="#">> ahmed Khlif  | all rights reserved! </a>
            </p>
        </div>
    </footer>


    </body>
</html>
