<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center">

         <a href="index.php" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>

         <nav class="nav">
            <a href="index.php"  >home</a>
            <a class="nav2" href="#about" >about</a>
            <a class="nav3"  href="products.php">menu</a>
            <a class="nav4"  href="#gallery">gallery</a>
            <a class="nav5"  href="#reviews">reviews</a>
            <a class="nav6"  href="#contact">contact</a>            
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

