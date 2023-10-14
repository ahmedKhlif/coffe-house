<?php
    session_start();
    require 'check_if_added.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="images/coffee.png" />
    <title>Product |</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS file link -->
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

        .menu {
            padding-top:150px ;
        }

        .box {
            position: relative;
            padding: 20px;
            text-align: center;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            margin: 10px;
        }

        .btn-buy-now {
            display: block;
            margin-top: 10px;
        }

        .out-of-stock {
            color: red;
        }
    </style>
</head>

<body>
    <div>
    <header class="header fixed-top">

<div class="container">

   <div class="row align-items-center">

      <a href="index.php" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>

      <nav class="nav">
         <a href="index.php"  >home</a>
         <a class="nav3"  href="products.php">menu</a>
           
         <?php
if(isset($_SESSION['email'])){
  ?>
    <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
        <?php
     }else{
     ?>
 
   <a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
    <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
   <?php
   }
    ?>
      <div id="menu-btn" class="fas fa-bars"></div>
      </nav>
   </div>
</div>
</header>
        <section class="menu" id="menu">
            <h1 class="heading"> our menu </h1>
            <div class="container box-container">
                <?php
                include('connection.php');
                $result = mysqli_query($con, "SELECT * FROM items");

                if(isset($_SESSION['email'])){
                    while($row = mysqli_fetch_array($result)){
                        $itemId = $row['id'];
                        $itemName = $row['name'];
                        $itemPrice = $row['price'];
                        $itemQuantity = $row['quantity'];

                        echo "<div class='box'>
                                <a href='cart.php'>
                                    <img src='".$row['image']."' >
                                </a>
                                <h3>".$itemName."</h3>
                                <p>".$itemPrice.' dt'."</p>";

                        if ($itemQuantity > 0) {
                            echo "<a href='cart_add.php?id=".$itemId."' class='btn btn-block btn-primary link-btn btn-buy-now'>Add to Cart</a>";
                        } else {
                            echo "<p class='out-of-stock'>Sorry, this item is out of stock. Please come back later.</p>";
                        }

                        echo "</div>";
                    }
                } else {
                    while($row = mysqli_fetch_array($result)){
                        echo "<div class='box'>
                                <a href='cart.php'>
                                    <img src='".$row['image']."' >
                                </a>
                                <h3>".$row['name']."</h3>
                                <p>".$row['price'].' dt'."</p>
                                <a href='login.php' class='btn btn-block btn-primary link-btn btn-buy-now'>Buy Now</a>
                              </div>";
                    }
                }
                ?>
            </div>
            <br><br><br><br><br><br><br><br>
        </section>

        <footer style="background-color:#512a10;">
            <div class="container" style="color:#512a10;font-size: 80px; padding: 80px 0;" align="center">
                <a style="color:white ;" href="#" class="fab fa-facebook-f"></a>
                <a style="color:white ;" href="#" class="fab fa-linkedin"></a>
                <a style="color:white ;" href="#" class="fab fa-twitter"></a>
                <a style="color:white ;" href="#" class="fab fa-github"></a>
            </div>
            <div>
                <p style="color: black; padding: 15px 0;" align="center">
                    &copy; 2023 Copyright: <a style="color:white ;"  href="#">ahmed Khlif  | all rights reserved! </a>
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
