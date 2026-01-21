<?php 
session_start();
include "db.php";
 include "header.php";

// GET parameter "cat", default = 'pc'
$cat = mysqli_real_escape_string($conn, $_GET['cate'] ?? 'MAN');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="products.css">
   <title>Products - <?= htmlspecialchars($cat) ?></title>
</head>

<body>

<h2 class="text-center mt-4"><?= htmlspecialchars($cat) ?></h2>

<div class="products-container">

<?php
$result = mysqli_query($conn, "SELECT * FROM products WHERE cate='$cat'");
while($row = mysqli_fetch_assoc($result)){
    echo "
    <div class='card'>
        <img src='{$row['img']}' class='card-img-top' alt='product image'>
        <div class='card-details'>
            <p class='text-title'>{$row['title']}</p>
            <p class='text-body'>{$row['price']}$</p>
        </div>
  <button class='card-button' onclick=\"location.href='add.php?id={$row['id']}'\">ADD TO CART</button>

    </div>
    ";
}

?>

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

</body>
</html>
