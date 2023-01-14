<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="../images/coffee.png" />
        <title>admin panel |</title>
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
<link rel="stylesheet" href="../style.css">
  <script defer src="script.js"></script>
  
</head>
<body>
  

    <section class="menu" id="menu">

<h1 class="heading"> admin panel !  </h1>

<div class="container box-container">
    <?php
    include('connection.php');
    $result = mysqli_query($con, "SELECT * FROM items");
    while($row = mysqli_fetch_array($result)){
        echo "
        <div class='box'>
        <a href='cart.php'>
        <img src='$row[image]' >
        </a>
        <h3>$row[name]</h3>
        <p>$row[price] dt </p>
        <a href='delete.php? id=$row[id]' class='btn btn-danger'>delete</a>
        <a href='update.php? id=$row[id]' class='btn btn-primary'>modify </a>
                </div>
        
  
        ";
    }
    ?>

</div>
</body>
</html>