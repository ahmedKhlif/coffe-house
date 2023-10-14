
<?php

include 'connection.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};




    require 'connection.php';
    //require 'header.php';
    session_start();
    $item_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $add_to_cart_query="insert into users_items(user_id,item_id,status) values ('$user_id','$item_id','Added to cart')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: products.php');

if(isset($_POST['add_to_cart'])){

$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_image = $_POST['product_image'];
$product_quantity = $_POST['product_quantity'];

$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

if(mysqli_num_rows($select_cart) > 0){
   $message[] = 'alredy product exists';
}else{
   mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
   $message[] = 'product add to cart successfully';
}

};