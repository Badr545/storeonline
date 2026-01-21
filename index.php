<?php 
session_start();
include "db.php";
include "header.php";

$result = mysqli_query($conn, "SELECT * FROM categorie");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StoreOnline</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="style.css">


<!-- ===== SEO BASIC ===== -->
<meta name="description" content="StoreOnline - Luxury perfumes with premium quality, fast delivery and authentic scents.">
<meta name="keywords" content="perfume, parfume, storeonline, luxury perfume, morocco perfumes">
<meta name="author" content="Badr Eddine">

<!-- ===== OPEN GRAPH (Facebook, WhatsApp, Discord) ===== -->
<meta property="og:title" content="StoreOnline | Luxury Perfumes">
<meta property="og:description" content="Discover premium perfumes with elegant scents and fast delivery across Morocco.">
<meta property="og:image" content="https://storeonline.xo.je/preview.png">
<meta property="og:url" content="https://storeonline.xo.je">
<meta property="og:type" content="website">

<!-- ===== TWITTER CARD ===== -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="StoreOnline | Luxury Perfumes">
<meta name="twitter:description" content="Premium perfumes, authentic scents, and elegant packaging.">
<meta name="twitter:image" content="https://storeonline.xo.je/preview.png">

<!-- ===== FAVICON ===== -->
<link rel="icon" type="image/png" href="preview.png">



</head>
<body>
    <!-- باقي المحتوى يبقى كما هو -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

<div class="head">

</div>



<div class="bg">
  <video autoplay muted loop playsinline id="bgVideo">
    <source src="1214.mp4" type="video/mp4">
  </video>

  <!-- FALLBACK -->
  <div id="bgFallback"></div>

  <div class="overlay">
    <h1 data-aos="fade-down" data-aos-duration="1200">
      Welcome to <b>StoreOnline</b>
    </h1>
    <img src="img1.png" alt="stronge with you absoltly" class="img" data-aos="fade-up" data-aos-duration="1200">
    <img src="img2.png" alt="n5 chanel paris" class="img" data-aos="fade-up" data-aos-duration="1200">

  </div>
</div>


        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
        AOS.init();
        </script>

        <div class="card">

            <h2 data-aos="fade-up" data-aos-duration="1200">COLLECTION</h2>
            <div class="item">
                <?php 
                while($row=mysqli_fetch_assoc($result)){
                    // unique class per card
                    $frontClass = "flip-card-front-".$row['id'];
                    $backClass  = "flip-card-back-".$row['id'];

                    echo "
                        <style>
                        .{$frontClass} { 
                            background-image: url('{$row['image_front']}'); 
                            background-size: cover;    
                            background-repeat: no-repeat;
                            background-position: center;
                        }

                        .{$backClass} { 
                            background-image: url('{$row['image_back']}'); 
                            background-size: cover;    
                            background-repeat: no-repeat;
                            background-position: center;
                        }

                        .back-link {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            width: 100%;
                            height: 100%;
                            color: white;
                            text-decoration: none;
                }

                        </style>

                        <div class='flip-card' data-aos='fade-up' data-aos-duration='1200'>
                            <div class='flip-card-inner'>
                                <div class='flip-card-front {$frontClass}'>
                                
                                    <p class='title'>{$row['title']}</p>
                                    <p>Hover Me</p>
                                </div>
                                <div class='flip-card-back {$backClass}'>
                                
                                    <p class='title'></p>
                                </div>
                            </div>
                        </div>
                        
                    ";
                }
                ?>



                
                </div>
        </div>
</div>


<div class="products-container">
<?php
$products = mysqli_query($conn, "SELECT * FROM products LIMIT 6");
$i = 0; // counter initialized
while($p = mysqli_fetch_assoc($products)){
    $direction = ($i % 2 == 0) ? 'fade-left' : 'fade-right';
    echo "
    <div class='product-card' data-aos='{$direction}' data-aos-duration='1200'>
        <img src='{$p['img']}' alt='{$p['title']}'>
        <h3>{$p['title']}</h3>
        <p>{$p['price']} MAD</p>
    </div>
    ";
    $i++;
}
?>
</div>


<!-- Centered button -->
<div class="btn-wrapper">
    <a class="btn" href="allproducts.php">See More</a>
</div>



<section class="testimonials">
  <h2>What Our Customers Say</h2>
  <div class="testimonial-container">
    
    <div class="testimonial-card" data-aos='fade-right' data-aos-duration='1200'>
      <p class="review" >"Amazing perfumes! Fast delivery and excellent quality. Highly recommend!"</p>
      <h4>- Sarah L.</h4>
      <span class="stars">★★★★★</span>
    </div>

    <div class="testimonial-card" data-aos='fade-left' data-aos-duration='1200'>
      <p class="review">"Great customer service. I love the variety of products available."</p>
      <h4>- Ahmed B.</h4>
      <span class="stars">★★★★☆</span>
    </div>

    <div class="testimonial-card" data-aos='fade-right' data-aos-duration='1200'>
      <p class="review">"Beautiful packaging and authentic scents. Will order again!"</p>
      <h4>- Lina M.</h4>
      <span class="stars">★★★★★</span>
    </div>

  </div>
</section>


<div class="cadr-pro">
    <div class="defi">
            <h1 data-aos='fade-up' data-aos-duration='1200'>PARFUME</h1>
            <p data-aos='fade-up' data-aos-duration='1200'>Perfume is a mixture of aromatic essential oils, aroma compounds, and solvents that gives a pleasant and distinctive smell. It can be made from natural ingredients such as flowers, fruits, spices, or woods, or from synthetic chemicals that mimic natural scents. People use perfume to enhance their personal fragrance, express their style, and create a mood or impression. Different types of perfumes exist based on concentration, with stronger perfumes lasting longer and lighter ones providing a subtle scent.</p>
   </div>
    <footer class="custom-footer">

    <!-- Social Icons -->
    <div class="footer-social" data-aos='fade-up' data-aos-duration='1200'>
        <a href="https://www.instagram.com/p_sxdx/?__pwa=1#"><i class="bi bi-instagram"></i></a>
        <a href="#"><i class="bi bi-tiktok"></i></a>
    </div>

    <hr>

    <!-- Links + Copyright -->
    <p class="footer-text">
        © 2025, StoreOnline By Badr Eddine.  ·  
        <a href="#">Politique de confidentialité</a>  ·  
        <a href="#">Politique de remboursement</a>  ·  
        <a href="#">Conditions d’utilisation</a>  ·  
        <a href="#">Politique d’expédition</a>
    </p>

</footer>

           
</div>


<script>
const cards = document.querySelectorAll('.card');

function showCards() {
    cards.forEach(card => {
        const rect = card.getBoundingClientRect();
        if (rect.top < window.innerHeight - 100) {
            card.classList.add('show');
        }
    });
}

window.addEventListener('scroll', showCards);
window.addEventListener('load', showCards);
</script>


<script>
  const video = document.getElementById("bgVideo");
  const fallback = document.getElementById("bgFallback");

  function showFallback() {
    video.style.display = "none";
    fallback.style.display = "block";
  }

  // ila video فيه error
  video.addEventListener("error", showFallback);

  // ila connexion ضعيفة وما بداش
  setTimeout(() => {
    if (video.readyState < 3) {
      showFallback();
    }
  }, 3000);
</script>



</body>
</html>



