<header class="header fixed-top">
   <div class="container">
      <div class="row align-items-center">
         <a href="index.php" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee for the Admin </a>
         <nav class="nav">
         <a href="../index.php">Client Page</a>
            <a href="index.php">home</a>
            <a class="nav3" href="products.php">menu</a>
            <a class="nav4" href="users.php">gallery</a>
            <a class="nav6" href="contact.php">contact</a>
            <?php
               if(isset($_SESSION['email'])){
            ?>
            <a href="../profile.php"><span class="glyphicon glyphicon-log-out"></span> Setings</a>
            <a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            <?php
               }
            ?>
         </nav>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>
   </div>
</header>
