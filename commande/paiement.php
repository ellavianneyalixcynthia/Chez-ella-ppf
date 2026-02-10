<?php $total = $_POST['total']; ?>

<h2>Paiement sécurisé</h2>

<p><strong>Total :</strong> <?= $total ?> FCFA</p>

<ul>
  <li>🟠 Orange Money : 69X XXX XXX</li>
  <li>🟡 MTN MoMo : 67X XXX XXX</li>
</ul>

<form method="POST" action="save_commande.php">
  <input type="hidden" name="montant" value="<?= $total ?>">
  <input name="nom" placeholder="Nom" required>
  <input name="telephone" placeholder="Téléphone" required>
  <input name="transaction" placeholder="Transaction ID" required>
  <button>Confirmer</button>
</form>
