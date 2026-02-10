<?php
// Récupération des quantités
$poulet = isset($_POST['poulet']) ? (int)$_POST['poulet'] : 0;
$porc   = isset($_POST['porc']) ? (int)$_POST['porc'] : 0;

// Prix unitaires
$prixPoulet = 4500;
$prixPorc   = 6000;

// Calcul du total
$total = ($poulet * $prixPoulet) + ($porc * $prixPorc);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Panier – Chez Ella PPF</title>
</head>
<body>

<h2>🛒 Votre panier</h2>

<p>🐔 Poulet fumé : <strong><?= $poulet ?></strong> × 4 500 FCFA</p>
<p>🐖 Porc fumé : <strong><?= $porc ?></strong> × 6 000 FCFA</p>

<h3>💰 Total : <?= $total ?> FCFA</h3>

<!-- 🔥 BOUTON WHATSAPP AUTOMATIQUE -->
<a
href="https://wa.me/237656115881?text=Bonjour%20Chez%20Ella%20PPF%20👋%0A%0AJe%20souhaite%20commander%20:%0A- Poulet%20fumé%20:%20<?= $poulet ?>%0A- Porc%20fumé%20:%20<?= $porc ?>%0A%0ATotal%20:%20<?= $total ?>%20FCFA%0A%0AMerci."
target="_blank"
style="
display:block;
margin:25px 0;
padding:15px;
background:#25D366;
color:white;
text-align:center;
border-radius:30px;
font-weight:bold;
text-decoration:none;
width:100%;
max-width:400px;
"
>
💬 Commander via WhatsApp
</a>

<!-- Bouton continuer vers paiement classique -->
<form action="paiement.php" method="POST">
  <input type="hidden" name="poulet" value="<?= $poulet ?>">
  <input type="hidden" name="porc" value="<?= $porc ?>">
  <input type="hidden" name="total" value="<?= $total ?>">
  <button type="submit">💳 Continuer vers le paiement</button>
</form>

</body>
</html>
