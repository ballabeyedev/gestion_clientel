<?php
require('../fpdf/fpdf.php'); // Assure-toi que ce chemin est correct

class PDF extends FPDF {
    // En-tête
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->SetFillColor(230, 230, 230);
        $this->Cell(0, 10, 'Liste des utilisateurs', 0, 1, 'C', true);
        $this->Ln(10);
    }

    // Pied de page
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    // Tableau
    function BasicTable($header, $data) {
        // Largeurs des colonnes
        $w = array(20, 20, 50, 30, 55, 20);

        // En-tête
        $this->SetFillColor(200, 220, 255);
        $this->SetFont('Arial', 'B', 12);
        for($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();
        
        // Données
        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            for($i = 0; $i < count($row); $i++) {
                $this->Cell($w[$i], 6, $row[$i], 1);
            }
            $this->Ln();
        }
    }
}

// Récupérer les données des utilisateurs
require_once '../modele/ClientModel.php'; // Chemin relatif corrigé
require_once '../config/connexion.php'; // Chemin relatif corrigé

// Initialisation du modèle avec la connexion à la base de données
$model = new ClientModel($db);
$users = $model->GetAllClients();

// Créer un nouvel objet PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// En-têtes du tableau
$header = array('Prenom', 'Nom', 'Email', 'Numero', 'Adresse', 'Sexe');

// Données du tableau
$data = [];
foreach ($users as $user) {
    $prenom = isset($user['prenom']) ? $user['prenom'] : '';
    $nom = isset($user['nom']) ? $user['nom'] : '';
    $email = isset($user['email']) ? $user['email'] : '';
    $numero = isset($user['numero']) ? $user['numero'] : '';
    $adresse = isset($user['adresse']) ? $user['adresse'] : '';
    $sexe = isset($user['sexe']) ? $user['sexe'] : '';
    $data[] = array($prenom, $nom, $email, $numero, $adresse, $sexe);
}

// Ajouter le tableau au PDF
$pdf->BasicTable($header, $data);

// Générer et envoyer le PDF au navigateur
$pdf->Output();
?>
