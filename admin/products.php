<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include your head content here -->
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../images/coffee.png" />
    <title>admin panel |</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        .center-message {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .out-of-stock {
            color: red;
        }
    </style>
</head>

<body>
<header class="header fixed-top">
   <div class="container">
      <div class="row align-items-center">
         <a href="index.php" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee for the Admin </a>
         <nav class="nav">
            <a href="index.php">home</a>
            <a class="nav3" href="products.php">menu</a>
            <a class="nav4" href="users.php">gallery</a>
            <a class="nav6" href="contact.php">contact</a>
        
            <a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            <?php
               
            ?>
         </nav>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>
   </div>
</header>

    <section class="menu" id="menu">
        <h1 class="heading"> admin panel! </h1>
        <div class="container box-container">
            <?php
            include('connection.php');
            session_start();

            if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
              // If the user is not logged in or not an admin, display an error message
              echo "Access Denied. You do not have permission to access this page.";
              header("Location: /projaa/index.php"); // Redirect to client 
              exit();
            }
            
            
            $result = mysqli_query($con, "SELECT * FROM items");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $stockStatus = ($row['quantity'] > 0) ? '' : 'out-of-stock';
                    echo "
                    <div class='box'>
                        <a href='cart.php'>
                            <img src='$row[image]' >
                        </a>
                        <h3 class='$stockStatus'>$row[name]</h3>
                        <p>$row[price] dt </p>
                        <p class='card-text'>Quantity: $row[quantity]</p>
                        <a href='delete.php?id=$row[id]' class='btn btn-danger'>delete</a>
                        <a href='update.php?id=$row[id]' class='btn btn-primary'>modify </a>
                    </div>";
                }
            } else {
                echo "
                <div class='col text-center center-message'>
                    <h2>No products available 😞</h2>
                    <p>The employer needs coffee! ☕</p>
                </div>";
            }
            ?>
        </div>
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
</body>

</html>
