<?php

include('connection.php');

if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $NAME  = $_POST['name'];
    $PRICE = $_POST['price'];
    $QUANTITY = $_POST['quantity'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    move_uploaded_file($image_location,'images/'.$image_name);
    $image_up = "images/".$image_name;
    $update = "UPDATE items SET name='$NAME', price='$PRICE', quantity='$QUANTITY', image='$image_up' WHERE id=$ID";
    mysqli_query($con, $update);

    header('location: index.php');
}
?>