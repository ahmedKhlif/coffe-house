<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shope online</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<center >
      <div class="main">
          <form action ="insert.php" method="post" enctype="multipart/form-data">
              <h2>admin Panel</h2>
              <img src="images/admin-image.jpg" alt="coffe-image" width="450px" />
              <br>
              <input type="text" name="name" placeholder="type coffe name here !">
              <br />
              <input type="text" name="price" placeholder=" type price of coffe here !"/>
              <br />
              <input type="file" id="file" name="image" style="display: none;" /> 
              <label for="file">pick a image </label>
              <button name="upload">✅ coffe uploaded</button>
              <br><br>
              <a href="products.php"> all products </a>
          </form>
      </div>
  </center>
</body>
</html>