<?php 
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <header>
  <link rel="stylesheet" href="header.css">

  <div class="logo" onclick="window.location.href='index.php'">StoreOnline</div>

  <div class="menu-toggle" id="menu-toggle">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <nav id="nav-menu">
    <a href="index.php">Home</a>

    <div class="dropdown">
      <a href="#" class="dropbtn">Categories ▾</a>
      <div class="dropdown-content">
        <a href="products.php?cate=MAN">MAN</a>
        <a href="products.php?cate=WOMAN">WOMAN</a>
        <a href="products.php?cate=PROMO">PROMO</a>
        <a href="products.php?cate=PACK">PACK</a>
      </div>
    </div>

    <a href="aboutUs.php">About</a>
    <a href="contacte.php">Contact</a>
<!-- <input type="text" id="search" placeholder="Search products..."> -->
<a href="cart.php" class="cart-icon">🛒
  <span id="cartCount">
    <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>
  </span>
</a>






    </div>

  </nav>
</header>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const burger = document.getElementById("burger");
  const navMenu = document.getElementById(".nav nav");

  // Toggle main mobile menu
  toggle.addEventListener("click", () => {
    nav.classList.toggle("active");
  });

  // Toggle dropdowns in mobile
  document.querySelectorAll(".dropbtn").forEach(btn => {
    btn.addEventListener("click", e => {
      e.preventDefault();
      const parent = btn.parentElement;
      parent.classList.toggle("show");
    });
  });
});

</script>

</body>
</html>
