<?php
// 🔐 Sécurité minimale
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: commander.php");
    exit;
}

// 1️⃣ Connexion à la base de données
$host = "localhost";
$db   = "chez_ella";   // nom EXACT de ta base
$user = "root";        // XAMPP par défaut
$pass = "";            // mot de passe vide sur XAMPP

$conn = new mysqli($host, $user, $pass, $db);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur connexion : " . $conn->connect_error);
}

// 2️⃣ Récupération des données du formulaire
$nom      = trim($_POST['nom']);
$email    = trim($_POST['email']);
$commande = trim($_POST['commande']);

// 3️⃣ Requête SQL (ICI EST L’INSERTION 👇)
$sql = "INSERT INTO inscription (nom, email, commande)
        VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erreur préparation : " . $conn->error);
}

$stmt->bind_param("sss", $nom, $email, $commande);

// 4️⃣ Exécution
if ($stmt->execute()) {
    header("Location: commander.php?success=1");
} else {
    header("Location: commander.php?error=1");
}

// 5️⃣ Fermeture
$stmt->close();
$conn->close();
exit;
