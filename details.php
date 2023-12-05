    <?php
    require 'connection.php';
    // require 'header.php';
    session_start();
    $user_id = $_SESSION['id'];

    // Check if the form is submitted
    if (isset($_POST['confirm_order'])) {

        // Update delivery attribute to 'Shipping start' when the user confirms the order
        $updateDeliveryQuery = "UPDATE users SET delivery = 'Shipping start' WHERE id = $user_id";
        mysqli_query($con, $updateDeliveryQuery);
    }

    // Check if any items are confirmed for the user
    $checkConfirmedItemsQuery = "SELECT * FROM users_items WHERE user_id = $user_id AND status = 'Confirmed'";
    $confirmedItemsResult = mysqli_query($con, $checkConfirmedItemsQuery);

    // If there are confirmed items, update delivery to 'Demands shipping'
    if (mysqli_num_rows($confirmedItemsResult) > 0 && !isset($_POST['confirm_order'])) {
        $updateDeliveryQuery = "UPDATE users SET delivery = 'Demands shipping' WHERE id = $user_id";
        mysqli_query($con, $updateDeliveryQuery);
    }

    // Fetch user details
    $selectUserQuery = "SELECT * FROM users WHERE id = $user_id";
    $userResult = mysqli_query($con, $selectUserQuery);
    $userDetails = mysqli_fetch_assoc($userResult);

    // Fetch ordered items and total payment
    $selectItemsQuery = "SELECT items.name AS item_name, items.price AS item_price, items.image AS item_image, users_items.status AS item_status
                        FROM users_items 
                        JOIN items ON users_items.item_id = items.id 
                        WHERE users_items.user_id = $user_id";
    $itemsResult = mysqli_query($con, $selectItemsQuery);

    // Calculate total payment and check if there are any ordered items
    $totalPayment = 0;
    $orderedItems = [];
    while ($row = mysqli_fetch_assoc($itemsResult)) {
        $totalPayment += $row['item_price'];
        $orderedItems[] = $row;
    }

    // Delivery cost (you can adjust this value as needed)
    $deliveryCost = 0;

    // Calculate total payment including delivery cost
    $totalPayment += $deliveryCost;
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

      </style>
        </head>

    <body>
        <?php
        require 'header.php';
        ?>
        <br>
  <br>
  <br>
  <br>
  <br>
  <br>
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
                                <?php foreach ($orderedItems as $item) : ?>
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
                        &copy; 2023 Copyright: <a style="color:white ;" href="#">ahmed Khlif | all rights reserved! </a>
                    </p>
                </div>
            </footer>

            <!-- Bootstrap JS and Popper.js CDN Links -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

    </html>
