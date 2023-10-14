
<?php
session_start();

// Check if the user is not logged in or not an admin
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    // If the user is not logged in or not an admin, display an error message
    echo "Access Denied. You do not have permission to access this page.";
    header("Location: /projaa/index.php"); // Redirect to client 
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
  
<head>
<title>admin panel</title>
    <!-- Bootstrap CSS Link -->
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script defer src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  
    
    
    <style>
              header {
            background-color:#512a10;
        } 
        .custom-margin-top {
    margin-top: 20rem !important;
}
        </style>
</head>
<body>
<?php
            require 'header.php';
           ?>
<center >
      <div class="main">
          <form action ="insert.php" method="post" enctype="multipart/form-data">
              <h2>admin Panel</h2>
            
              <div class="col-md-6 mb-5">
         <img src="images/admin-image.jpg" class="w-100 custom-margin-top" alt="">
      </div>
              <br>
              
              <input type="text"class="form-control" name="name" placeholder="type coffe name here !">
              <br />
              <input type="text"class="form-control" name="price" placeholder=" type price of coffe here !"/>
              <br />
              
                <input type="number" class="form-control" name="quantity" placeholder="type quantity available">
                <br />
              <input required type="file" id="file" name="image" style="display: none;" /> 
              <label for="file">pick a image </label>
              <button name="upload">✅ coffe uploaded</button>
              <br><br>
              <a href="products.php"> View  all products </a>
              <br>
              <a href="users.php">View All Users</a> <!-- Link to users.php -->

          </form>
      </div>
  </center>
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
</body>
</html>