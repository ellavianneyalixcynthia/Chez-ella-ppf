<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Boutique – Chez Ella PPF</title>
<link rel="stylesheet" href="../assets/css/shop.css">
</head>
<body>

<h1>🛒 Boutique Chez Ella – PPF</h1>

<div class="products">

  <div class="product">
    <img src="../assets/images/poulet.jpg">
    <h3>Poulet fumé</h3>
    <p>4 500 FCFA / pièce</p>
    <input type="number" min="0" value="0" id="poulet">
  </div>

  <div class="product">
    <img src="../assets/images/porc.jpg">
    <h3>Porc fumé</h3>
    <p>6 000 FCFA / kg</p>
    <input type="number" min="0" value="0" id="porc">
  </div>

</div>

<button onclick="addToCart()">Ajouter au panier</button>

<script src="../assets/js/cart.js"></script>
</body>
</html>
