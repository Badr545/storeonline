<?php 
include "db.php";



if (isset($_POST["btn"])) {

    $NAME  = $_POST["title"];
    $PRICE = $_POST["price"];
    $CATE = $_POST["cate"];

    // Image
    $image_name     = $_FILES["img"]["name"];
    
    $image_tmp_name = $_FILES["img"]["tmp_name"];
    $image_name = preg_replace('/[^A-Za-z0-9.\-_]/', '_', $image_name);
    $image_up       = "images/" . $image_name;

    move_uploaded_file($image_tmp_name, $image_up);

    $insert = "INSERT INTO products (title,price,img,cate)
               VALUES ('$NAME', '$PRICE', '$image_up', '$CATE')";

    mysqli_query($conn, $insert);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashbord.css">
    <link rel="stylesheet" href="header.css">
    <title>Dashboard</title>
</head>

<!-- HEADER -->
<header class="main-header">
  <div class="logo">
    <h1>My Shop</h1>
  </div>
  <nav class="nav-links">
    <a href="dashbord.php" class="active">Dashboard</a>
    <a href="command.php">Commandes</a>
    <a href="productAdmin.php">All products</a>
    <a href="index.php">Home</a>
  </nav>
</header>





<body>
    <div class="form">
        <center class="centr">
            <form action="" method="POST" enctype="multipart/form-data">

                <h1>WELCOME TO ...</h1>

                <img src="https://i.pinimg.com/736x/8b/63/b3/8b63b33a5247e7e60189805640419b43.jpg" alt="">

                <h3>Title:</h3>
                <input type="text" name="title" required>

                <h3>Price:</h3>
                <input type="number" name="price" required>

                <h3>categories:</h3>
                <input type="text" name="cate" required>

                <h3>File:</h3>
                <input type="file" id="file" name="img" style="display:none;" required>
                <label for="file">Upload a photo</label>

                <br><br>

                <button type="submit" name="btn">SEND</button>

            </form>

            
        </center>
 
    </div>


</body>
</html>
