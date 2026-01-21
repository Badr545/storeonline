<?php
session_start();

$id = $_GET['id'] ?? 0;
$action = $_GET['action'] ?? '';

if (isset($_SESSION['cart'][$id])) {

    if ($action == "plus") {
        $_SESSION['cart'][$id]['qty']++;
    }

    if ($action == "minus") {
        $_SESSION['cart'][$id]['qty']--;
        if ($_SESSION['cart'][$id]['qty'] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }
}

header("Location: cart.php");
exit;
