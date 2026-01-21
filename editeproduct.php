<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="dashbord.css">
</head>
<body>

<?php
include "db.php";

$ID = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// ===== GET PRODUCT =====
$sql = "SELECT * FROM products WHERE id = $ID";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $text     = $row['title'];
    $price    = $row['price'];
    $cate     = $row['cate'];
    $old_img  = $row['img'];
} else {
    echo "Product not found";
    exit;
}
?>

<center>
<form action="" method="POST" enctype="multipart/form-data">

    <input type="text" name="title" value="<?php echo htmlspecialchars($text); ?>" required><br><br>

    <input type="text" name="price" value="<?php echo htmlspecialchars($price); ?>" required><br><br>

    <input type="text" name="cate" value="<?php echo htmlspecialchars($cate); ?>" required><br><br>

    <input type="file" id="file" name="img" style="display:none;">
    <label for="file" style="cursor:pointer;">Upload a photo</label><br><br>

    <button type="submit" name="update">UPDATE</button>

</form>
<a href="productAdmin.php">back</a>
</center>

<?php
// ===== UPDATE =====
if (isset($_POST['update'])) {

    $NEWTITLE = mysqli_real_escape_string($conn, $_POST['title']);
    $NEWPRICE = mysqli_real_escape_string($conn, $_POST['price']);
    $NEWCATE  = mysqli_real_escape_string($conn, $_POST['cate']);

    // IMAGE
    if (!empty($_FILES['img']['name'])) {
        $img_name = time() . "_" . $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        move_uploaded_file($tmp_name, "uploads/" . $img_name);

        $sql = "
        UPDATE products 
        SET title='$NEWTITLE', price='$NEWPRICE', cate='$NEWCATE', img='$img_name'
        WHERE id=$ID
        ";
    } else {
        // بلا تغيير الصورة
        $sql = "
        UPDATE products 
        SET title='$NEWTITLE', price='$NEWPRICE', cate='$NEWCATE'
        WHERE id=$ID
        ";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;text-align:centre;margin-top:0;'>Updated successfully</p>";
        // header("location: editeproduct.php?id=$ID");
    } else {
        echo "<p style='color:red;'>Error</p>";
    }
}
?>

</body>
</html>
