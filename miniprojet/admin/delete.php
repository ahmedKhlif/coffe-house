<?php

include('connection.php');
$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM items WHERE id=$ID");
header('location: products.php')

?>