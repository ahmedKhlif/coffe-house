<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['email'])) {
    header('location: login.php');
}

$user_id = $_SESSION['id'];
$user_products_query = "select * from users_items, items where user_id='$user_id' and users_items.item_id = items.id";
$user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));
$no_of_user_products = mysqli_num_rows($user_products_result);
$sum = 0;

if ($no_of_user_products == 0) {
    ?>
    <script>
        window.alert("No items in the cart!!");
    </script>
    <?php
} else {
    while ($row = mysqli_fetch_array($user_products_result)) {
        $sum = $sum + $row['price'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="images/coffee.png" />
    <title>Cart |</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        header {
            background-color: #512a10;
        }

        .home {
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.7)), to(rgba(0, 0, 0, 0.7))), url(/images/home-bg.jpg) no-repeat;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(images/home-bg.jpg) no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .a7a,
        h1 {
            padding-top: 150px;

        }

        h1 {
            border: 2px solid #512a10;
            border-radius: 5px;

        }
    </style>
</head>

<body>
    <div>
        <?php
        require 'header.php';
        ?>
        <?php
        $select_user = mysqli_query($con, "SELECT * FROM `users` WHERE id = '$user_id'");
        if (mysqli_num_rows($select_user) > 0) {
            $fetch_user = mysqli_fetch_assoc($select_user);
        };
        ?>

        <h1 class="heading"> Welcome <?php echo $fetch_user['name']; ?> </h1>
        <div class="container a7a">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Coffee Number</th>
                        <th>Coffee Name</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    <?php
                    $user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));
                    $no_of_user_products = mysqli_num_rows($user_products_result);
                    $counter = 1;
                    while ($row = mysqli_fetch_array($user_products_result)) {

                    ?>
                        <tr>
                            <th><?php echo $counter ?></th>
                            <th><?php echo $row['name'] ?></th>
                            <th><?php echo $row['price'] ?></th>
                            <th><a href='cart_remove.php?id=<?php echo $row['id'] ?>'>Remove</a></th>
                        </tr>
                    <?php
                        $counter = $counter + 1;
                    }
                    ?>
                    <tr>
                        <th></th>
                        <th>Total</th>
                        <th>dt <?php echo $sum; ?>/-</th>
                        <th><a href="success.php?id=<?php echo $user_id ?>" class="btn btn-primary">Confirm Order</a></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
        <footer style="background-color:#512a10;">
            <div class="container" style="color:#512a10;font-size: 80px; padding: 80px 0;" align="center">
                <a style="color:white ;" href="#" class="fab fa-facebook-f"></a>
                <a style="color:white ;" href="#" class="fab fa-linkedin"></a>
                <a style="color:white ;" href="#" class="fab fa-twitter"></a>
                <a style="color:white ;" href="#" class="fab fa-github"></a>
            </div>
            <div>
                <p style="color: black; padding: 15px 0;" align="center">
                    &copy; 2023 Copyright: <a style="color:white ;" href="#">bouthy and ahmed ♥ | all rights reserved! </a>
                </p>
            </div>
        </footer>
    </div>
</body>

</html>
