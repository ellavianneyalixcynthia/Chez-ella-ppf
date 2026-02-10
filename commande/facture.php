<?php
require('../fpdf/fpdf.php');

// Sécurité minimale
if (!isset($_GET['nom']) || !isset($_GET['total'])) {
    die('Accès non autorisé');
}

// Récupération des données
$nom       = htmlspecialchars($_GET['nom']);
$poulet    = $_GET['poulet'] ?? 0;
$porc      = $_GET['porc'] ?? 0;
$total     = $_GET['total'];
$telephone = $_GET['telephone'] ?? '—';
$date      = date('d/m/Y H:i');

// Création du PDF
$pdf = new FPDF();
$pdf->AddPage();

// Logo (optionnel)
// $pdf->Image('../images/logo.png',10,10,30);

// Titre
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'FACTURE CLIENT',0,1,'C');
$pdf->Ln(5);

// Infos entreprise
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,'Entreprise : Chez Ella – PPF',0,1);
$pdf->Cell(0,7,'Activite : Porc & Poulet Fume',0,1);
$pdf->Cell(0,7,'Localisation : Yaounde',0,1);
$pdf->Cell(0,7,'Contact : +237 656 115 881',0,1);
$pdf->Ln(5);

// Infos client
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,'Informations Client',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,'Nom : '.$nom,0,1);
$pdf->Cell(0,7,'Telephone : '.$telephone,0,1);
$pdf->Cell(0,7,'Date : '.$date,0,1);
$pdf->Ln(8);

// Tableau
$pdf->SetFont('Arial','B',11);
$pdf->Cell(80,8,'Produit',1);
$pdf->Cell(30,8,'Quantite',1);
$pdf->Cell(40,8,'Prix Unitaire',1);
$pdf->Cell(40,8,'Total',1);
$pdf->Ln();

// Produits
$pdf->SetFont('Arial','',11);

if ($poulet > 0) {
    $pdf->Cell(80,8,'Poulet fume',1);
    $pdf->Cell(30,8,$poulet,1);
    $pdf->Cell(40,8,'4 500 FCFA',1);
    $pdf->Cell(40,8,($poulet * 4500).' FCFA',1);
    $pdf->Ln();
}

if ($porc > 0) {
    $pdf->Cell(80,8,'Porc fume',1);
    $pdf->Cell(30,8,$porc,1);
    $pdf->Cell(40,8,'6 000 FCFA',1);
    $pdf->Cell(40,8,($porc * 6000).' FCFA',1);
    $pdf->Ln();
}

// Total général
$pdf->SetFont('Arial','B',12);
$pdf->Ln(5);
$pdf->Cell(150,10,'TOTAL A PAYER',1);
$pdf->Cell(40,10,$total.' FCFA',1);
$pdf->Ln(15);

// Footer
$pdf->SetFont('Arial','I',10);
$pdf->MultiCell(0,7,"Merci pour votre confiance.\nChez Ella – PPF vous garantit un produit fume de qualite et un service fiable.");

// Sortie PDF
$pdf->Output('I','facture_chez_ella.pdf');
