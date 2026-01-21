<?php
include "db.php";

// ===== DEBUG (حيدهم ملي تسالي) =====
ini_set('display_errors', 1);
error_reporting(E_ALL);

// ===== DELETE COMMANDE =====
if (isset($_GET['delete_product'])) {
    $id = intval($_GET['delete_product']);

    $stmt = $conn->prepare("DELETE FROM commande WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: command.php");
    exit();
}

// ===== FETCH COMMANDES =====
$result = $conn->query("SELECT * FROM commande ORDER BY id DESC");
$commandes = $result->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Commandes</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="dashbord.css">
  <link rel="stylesheet" href="header.css">
</head>

<body class="comm">

<!-- HEADER -->
<header class="main-header">
  <div class="logo"><h1>My Shop</h1></div>
  <nav class="nav-links">
    <a href="dashbord.php">Dashboard</a>
    <a href="command.php" class="active">Commandes</a>
    <a href="productAdmin.php">All products</a>
    <a href="index.php">Home</a>
  </nav>
</header>

<center>
<div class="tablee">
<h1>Commandes</h1>

<table border="1" style="margin-top:20px;border-collapse:collapse;text-align:center;">
<tr>
  <th>ID</th>
  <th>NAME</th>
  <th>PRICE</th>
  <th>TELE</th>
  <th>VILLE</th>
  <th>ADRESSE</th>
  <th>CONTENUE</th>
  <th>STATUT</th>
  <th>ACTION</th>
</tr>

<?php foreach ($commandes as $c): ?>
<tr>
  <td><?= $c['id'] ?></td>
  <td><?= htmlspecialchars($c['nom_complet']) ?></td>
  <td><?= htmlspecialchars($c['price']) ?> $</td>
  <td><?= htmlspecialchars($c['telephone']) ?></td>
  <td><?= htmlspecialchars($c['ville']) ?></td>
  <td><?= htmlspecialchars($c['adresse']) ?></td>
  <td><?= htmlspecialchars($c['contenue']) ?></td>
  <td><?= $c['statue'] == 1 ? '✔️' : '⏳' ?></td>
  <td>
    <a href="?delete_product=<?= $c['id'] ?>" 
       onclick="return confirm('Delete this commande?')">
       ❌ Delete
    </a>
  </td>
</tr>
<?php endforeach; ?>

</table>
</div>
</center>

</body>
</html>









<script>
document.addEventListener("DOMContentLoaded", () => {
  const toggle = document.getElementById("menu-toggle");
  const nav = document.getElementById("nav-menu");

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



