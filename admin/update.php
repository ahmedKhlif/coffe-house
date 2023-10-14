<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include your head content here -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update | </title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    include('connection.php');
  
    session_start();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM items WHERE id=$id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
    ?>
        <center>
            <div class="main">
                <form action="up.php" method="post" enctype="multipart/form-data">
                    <h2>Update Product</h2>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>
                    <input type="text" name='name' value='<?php echo $row['name']; ?>'>
                    <br>
                    <input type="number" name='price' value='<?php echo $row['price']; ?>'>
                    <br>
                    <input type="number" name='quantity' value='<?php echo $row['quantity']; ?>' placeholder="Quantity" required>
                    <br>
                    <input type="file" id="file" name='image' style='display:none;'>
                    <label for="file">Change Image</label>
                    <button name='update' type='submit'>Update Product</button>
                    <br><br>
                    <a href="products.php">Go back to products</a>
                </form>
            </div>
        </center>
    <?php
    } else {
        echo "Invalid request!";
    }
    ?>
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
