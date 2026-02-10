$conn = new mysqli("localhost","root","","chez-ella");

$stmt = $conn->prepare(
"INSERT INTO commandes (nom, telephone, montant, transaction)
 VALUES (?, ?, ?, ?)"
);

$stmt->bind_param("ssis",
$_POST['nom'],
$_POST['telephone'],
$_POST['montant'],
$_POST['transaction']
);

$stmt->execute();

header("Location: confirmation.php");
