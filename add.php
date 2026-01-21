<?php
session_start();
include "db.php";

$id = $_GET['id'] ?? 0;

$result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Product not found");
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = [
        "title" => $product['title'],
        "price" => $product['price'],
        "img" => $product['img'],
        "qty" => 1
    ];
} else {
    $_SESSION['cart'][$id]['qty']++;
}

header("Location: cart.php");
exit;
