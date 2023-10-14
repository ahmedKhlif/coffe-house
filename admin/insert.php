<?php

include('connection.php');


if(isset($_POST['upload'])){
    $NAME  = $_POST['name'];
    $PRICE = $_POST['price'];
    $QUANTITY = $_POST['quantity']; // Get quantity from the form
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    move_uploaded_file($image_location,'images/'. $image_name);
    $image_up = "images/".$image_name;
    $insert = "INSERT INTO items (name, price, quantity, image) VALUES ('$NAME', '$PRICE', '$QUANTITY', '$image_up')";
    mysqli_query($con, $insert);
    header('location: index.php');
}
?>
