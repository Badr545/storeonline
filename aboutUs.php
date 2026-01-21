<?php 
session_start();
include "db.php";
include "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us – StoreOnline</title>
    <link rel="stylesheet" href="aboutUs.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
        AOS.init();
        </script>
<body>

<div class="about-header">
    <h1  data-aos='fade-up' data-aos-duration='1200'>ABOUT US</h1>
    <p  data-aos='fade-up' data-aos-duration='1200'>Welcome StoreOnline – Your Destination for Luxury Perfumes</p>
</div>

<div class="about-container"  data-aos='fade-up' data-aos-duration='1200'>

    <div class="about-section" data-aos='fade-up' data-aos-duration='1200'>
        <h2 data-aos='fade-up' data-aos-duration='1200'>Who We Are</h2>
        <p>
            StoreOnline is a brand dedicated to offering high-quality perfumes inspired by elegance, authenticity, and style. 
            We believe fragrance is more than just a smell — it’s an identity, a memory, and a signature.
        </p>
    </div>

    <div class="about-section" data-aos='fade-up' data-aos-duration='1200'>
        <h2 data-aos='fade-up' data-aos-duration='1200'>Our Mission</h2>
        <p>
            Our mission is to bring premium-quality perfume to everyone at an affordable price. 
            We hand-select each fragrance note to guarantee freshness, longevity, and uniqueness.
        </p>
    </div>

    <div class="about-section"  data-aos="fade-up" data-aos-duration="1200">
        <h2 data-aos='fade-up' data-aos-duration='1200'>Why Choose Us?</h2>
        <ul>
            <li> Premium long-lasting scents</li>
            <li> High-quality ingredients</li>
            <li> Affordable luxury</li>
            <li> Trusted by thousands of customers</li>
            <li> Fast and secure delivery</li>
        </ul>
    </div>

    <div class="about-section" data-aos='fade-up' data-aos-duration='1200'>
        <h2 data-aos='fade-up' data-aos-duration='1200'>Our Vision</h2>
        <p>
            To become a leading perfume brand in Morocco and worldwide by providing scents that combine modern style and timeless elegance.
        </p>
    </div>

</div>

<footer class="custom-footer">
    <div class="footer-social">
        <a href="https://www.instagram.com/p_sxdx/?__pwa=1#"><i class="bi bi-instagram"></i></a>
        <a href="#"><i class="bi bi-tiktok"></i></a>
    </div>
    <hr>
    <p class="footer-text">
        © 2025, StoreOnline By Badr Eddine.
    </p>
</footer>
<style>
  html {
    scroll-behavior: smooth;
  }
</style>

</body>
</html>
