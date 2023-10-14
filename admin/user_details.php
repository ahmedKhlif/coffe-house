<?php
include('connection.php');
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
  // If the user is not logged in or not an admin, display an error message
  echo "Access Denied. You do not have permission to access this page.";
  header("Location: /projaa/index.php"); // Redirect to client 
  exit();
}


if(isset($_GET['id'])) {
    $userId = $_GET['id'];
    

    // Check if the form is submitted
    if(isset($_POST['confirm_order'])) {
      
        // Update status to "Confirmed" for the user's ite

        // Update delivery attribute to 'Shipping start' when the user confirms the order
        $updateDeliveryQuery = "UPDATE users SET delivery = 'Shipping start' WHERE id = $userId";
        mysqli_query($con, $updateDeliveryQuery);
    }

    // Check if any items are confirmed for the user
    $checkConfirmedItemsQuery = "SELECT * FROM users_items WHERE user_id = $userId AND status = 'Confirmed'";
    $confirmedItemsResult = mysqli_query($con, $checkConfirmedItemsQuery);

    // If there are confirmed items, update delivery to 'Demands shipping'
    if(mysqli_num_rows($confirmedItemsResult) > 0  && !isset($_POST['confirm_order'])) {
        $updateDeliveryQuery = "UPDATE users SET delivery = 'Demands shipping' WHERE id = $userId";
        mysqli_query($con, $updateDeliveryQuery);
    }

    // Fetch user details
    $selectUserQuery = "SELECT * FROM users WHERE id = $userId";
    $userResult = mysqli_query($con, $selectUserQuery);
    $userDetails = mysqli_fetch_assoc($userResult);

    // Fetch ordered items and total payment
    $selectItemsQuery = "SELECT items.name AS item_name, items.price AS item_price, items.image AS item_image, users_items.status AS item_status
                         FROM users_items 
                         JOIN items ON users_items.item_id = items.id 
                         WHERE users_items.user_id = $userId";
    $itemsResult = mysqli_query($con, $selectItemsQuery);

    // Calculate total payment and check if there are any ordered items
    $totalPayment = 0;
    $orderedItems = [];
    while($row = mysqli_fetch_assoc($itemsResult)) {
        $totalPayment += $row['item_price'];
        $orderedItems[] = $row;
    }

    // Delivery cost (you can adjust this value as needed)
    $deliveryCost = 0;

    // Calculate total payment including delivery cost
    $totalPayment += $deliveryCost;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Details</title>
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
    
        .item-image {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>

<body>
<?php
            require 'header.php';
           ?>
<div class="container mt-5 custom-margin-top">
    <h2>User Details</h2>
    <hr>
    <dl class="row">
        <dt class="col-sm-3">Name:</dt>
        <dd class="col-sm-9"><?php echo $userDetails['name']; ?></dd>

        <dt class="col-sm-3">Email:</dt>
<dd class="col-sm-9"><?php echo $userDetails['email']; ?></dd>

<dt class="col-sm-3">Contact Number:</dt>
<dd class="col-sm-9"><?php echo $userDetails['contact']; ?></dd>

<dt class="col-sm-3">City:</dt>
<dd class="col-sm-9"><?php echo $userDetails['city']; ?></dd>

<dt class="col-sm-3">Address:</dt>
<dd class="col-sm-9"><?php echo $userDetails['address']; ?></dd>

        <!-- Add other user details here similarly -->

        <dt class="col-sm-3">Ordered Items:</dt>
        <dd class="col-sm-9">
            <?php
            if (empty($orderedItems)) {
                echo "Not yet";
            } else {
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderedItems as $item): ?>
                            <tr>
                                <td><?php echo $item['item_name']; ?></td>
                                <td><?php echo $item['item_price']; ?> dt</td>
                                <td><?php echo $item['item_status']; ?></td>
                                <td><img src="<?php echo $item['item_image']; ?>" alt="Item Image" class="item-image"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } ?>
        </dd>

        <dt class="col-sm-3">Total Payment (Including Delivery Cost):</dt>
        <dd class="col-sm-9"><?php echo $totalPayment; ?> dt</dd>
    </dl>

    <!-- Button to confirm order -->
    <form method="post" action="">
    <button type="submit" class="btn btn-primary" name="confirm_order">Confirm Order</button>
</form>
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

<!-- Bootstrap JS and Popper.js CDN Links -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
