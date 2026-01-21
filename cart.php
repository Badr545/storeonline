<?php 
session_start();
include "db.php"; // DB connection

// ===== DEBUGGING (Temporary, remove in production) =====
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ===== POST handling first (before any HTML) =====
if(isset($_POST["TVA"])){
    $total = 0; $contenu = "";
    if(!empty($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $id => $item){
            $total += $item['price'] * $item['qty'];
            $contenu .= $item['title']." => quantity: ".$item['qty']." | ";
        }
    }
    $total1 = $total + 30;

    // ===== SANITIZE INPUTS =====
    $NAME  = htmlspecialchars(trim($_POST["Nom_Complet"]));
    $TELE  = htmlspecialchars(trim($_POST["Téléphone"]));
    $adrss = htmlspecialchars(trim($_POST["Adresse"]));
    $Ville = htmlspecialchars(trim($_POST["Ville"]));

    // ===== PREPARED STATEMENT (Safe INSERT) =====
    $stmt = $conn->prepare(
        "INSERT INTO commande (nom_complet, Telephone, Adresse, Ville, price, Contenue)
         VALUES (?, ?, ?, ?, ?, ?)"
    );

    if(!$stmt){
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssds", $NAME, $TELE, $adrss, $Ville, $total1, $contenu);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        unset($_SESSION['cart']);
        header("Location: cart.php?success=1");
        exit();
    } else {
        die("Erreur lors de l'enregistrement de la commande.");
    }
}

include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>
   <link rel="stylesheet" href="cart.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>

<div class="cart-container">
  <h2>Your Cart 🛒</h2>

  <?php if(empty($_SESSION['cart'])): ?>
    <p class="empty">Cart is empty!!</p>
  <?php else: 
    $total = 0;
    $contenu = "";
    foreach($_SESSION['cart'] as $id => $item){
      $total += $item['price'] * $item['qty'];
      $contenu .= $item['title']." => quantity: ".$item['qty']." | ";
    }
    $total1 = $total + 30;
  ?>
    <?php foreach($_SESSION['cart'] as $id => $item): ?>
      <div class="cart-item">
        <img src="<?= $item['img']; ?>" alt="">
        <div class="details">
          <h3><?= $item['title']; ?></h3>
          <p class="price"><?= $item['price']; ?> $</p>
          <div class="qty">
            <a href="qty.php?id=<?= $id ?>&action=minus">-</a>
            <span><?= $item['qty']; ?></span>
            <a href="qty.php?id=<?= $id ?>&action=plus">+</a>
          </div>
          <a class="remove" href="remove.php?id=<?= $id ?>">Remove</a>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="total">
      <h3>Total: <?= $total ?> $</h3>
      <button class="open-btn">Confirm the process</button>
    </div>
  <?php endif; ?>

  <a href="products.php" class="back-btn">← Back to Products</a>
</div>

<!-- Checkout Modal -->
<div class="modal" id="addressModal">
  <div class="modal-content">
    <span class="close" id="closeModal">&times;</span>
    <h2>Commande avec paiement à la livraison</h2>
    <form method="POST">
      <div class="form-group">
        <i class="bi bi-person"></i>
        <input type="text" placeholder="Nom Complet" required name="Nom_Complet">
      </div>
      <div class="form-group">
        <i class="bi bi-telephone"></i>
        <input type="text" placeholder="Téléphone" required name="Téléphone">
      </div>
      <div class="form-group">
        <i class="bi bi-geo-alt"></i>
        <input type="text" placeholder="Adresse" required name="Adresse">
      </div>
      <div class="form-group">
        <i class="bi bi-geo-alt"></i>
        <input type="text" placeholder="Ville" required name="Ville">
      </div>

      <div class="totals">
        <div><span>Sous-total</span> <span><?= $total ?> $</span></div>
        <div><span>Livraison</span> <span>30$</span></div>
        <div><span>Total</span> <span><?= $total1 ?> $</span></div>
      </div>

      <button type="submit" class="checkout-btn" name="TVA">Terminez votre achat - <?= $total1 ?> $</button>
    </form>
  </div>
</div>

<!-- Success Modal -->
<div class="success-modal" id="successModal">
  <div class="success-content">
    <span id="closeSuccess">&times;</span>
    <h2>✅ Achat confirmé !</h2>
    <p>Merci pour votre commande. Votre commande a été enregistrée avec succès.</p>
  </div>
</div>

<script>
// Modal logic
const openBtn = document.querySelector(".open-btn");
const modal = document.getElementById("addressModal");
const closeBtn = document.getElementById("closeModal");
const successModal = document.getElementById("successModal");
const closeSuccess = document.getElementById("closeSuccess");

if(openBtn){
    openBtn.onclick = () => modal.style.display = "flex";
}
if(closeBtn){
    closeBtn.onclick = () => modal.style.display = "none";
}
if(closeSuccess){
    closeSuccess.onclick = () => successModal.style.display = "none";
}

window.onclick = (e) => {
  if(e.target == modal) modal.style.display = "none";
  if(e.target == successModal) successModal.style.display = "none";
};

// Auto show & fade success modal if success=1
<?php if(isset($_GET['success'])): ?>
successModal.style.display = 'flex';
setTimeout(()=>{
    successModal.style.opacity = 1;
    let fadeEffect = setInterval(()=>{
        if(!successModal.style.opacity) successModal.style.opacity = 1;
        if(successModal.style.opacity > 0){
            successModal.style.opacity -= 0.05;
        } else {
            clearInterval(fadeEffect);
            successModal.style.display = 'none';
        }
    }, 20);
}, 3000);
<?php endif; ?>
</script>

</body>
</html>
