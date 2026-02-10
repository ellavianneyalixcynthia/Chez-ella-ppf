function addToCart() {
  const poulet = document.getElementById("poulet").value;
  const porc = document.getElementById("porc").value;

  localStorage.setItem("poulet", poulet);
  localStorage.setItem("porc", porc);

  window.location.href = "panier.php";
}
