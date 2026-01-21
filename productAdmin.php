<?php 
session_start();
include "db.php";

/* ===== DELETE LOGIC ===== */
if (isset($_POST['delete'])) {
    $id = intval($_POST['id']);
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header("Location: productAdmin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Products</title>
    <link rel="stylesheet" href="dashbord.css">
    <link rel="stylesheet" href="productsadmin.css">
</head>
<body>

<!-- HEADER -->
<header class="main-header">
  <div class="logo"><h1>My Shop</h1></div>
  <nav class="nav-links">
    <a href="dashbord.php">Dashboard</a>
    <a href="command.php">Commandes</a>
    <a href="productAdmin.php" class="active">All products</a>
    <a href="index.php">Home</a>
  </nav>
</header>

<div class="products-container">

<?php
$result = mysqli_query($conn, "SELECT * FROM products");
while ($row = mysqli_fetch_assoc($result)) {
?>
  <div class="card">
    <img src="<?= $row['img'] ?>" alt="">
    <div class="card-details">
      <p class="text-title"><?= $row['title'] ?></p>
      <p class="text-body"><?= $row['price'] ?> $</p>
    </div>

    <button class="card-button"
      onclick="location.href='editeproduct.php?id=<?= $row['id'] ?>'">
      Edit
    </button>

    <form method="POST" onsubmit="return confirm('Wash baghi tdelete had produit?')">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <button type="submit" name="delete" class="card-button delete">
        Delete
      </button>
    </form>
  </div>
<?php } ?>

</div>

<script>
const cards = document.querySelectorAll('.card');
function showCards() {
  cards.forEach(card => {
    if (card.getBoundingClientRect().top < window.innerHeight - 100) {
      card.classList.add('show');
    }
  });
}
window.addEventListener('scroll', showCards);
window.addEventListener('load', showCards);
</script>

</body>
</html>
