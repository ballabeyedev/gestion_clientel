<?php
require_once("../../config/connexion.php");
require_once("../../modele/ClientModel.php");
require_once("../../controller/ClientController.php");

$database = new Database();
$db = $database->getConnection();
$model = new ClientModel($db);
$controller = new ClientController($model);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/header.css">
    <link rel="stylesheet" href="../../public/css/footers.css">
    <link rel="stylesheet" href="../../public/css/modifier.css">
    <link rel="stylesheet" href="../../public/css/imprimer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Acceuil | ADMINISTRATEURS | IMPRIMER</title>
</head>
<body>
    <?php include '../../view/header.php'; ?>
    <br><br><br><br><br>
    <div class="container">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h3>IMPRIMER LISTE DES CLIENTS PDF/CSV / IMPRIMER</h3><br>

        <?php
        $clients = $controller->GetAllClients();
        if (!empty($clients)) {
            echo '<table>';
            echo '<thead><tr><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Numéro</th><th>Email</th><th>Sexe</th></tr></thead>';
            echo '<tbody>';
            foreach ($clients as $client) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($client['nom']) . '</td>';
                echo '<td>' . htmlspecialchars($client['prenom']) . '</td>';
                echo '<td>' . htmlspecialchars($client['adresse']) . '</td>';
                echo '<td>' . htmlspecialchars($client['numero']) . '</td>';
                echo '<td>' . htmlspecialchars($client['email']) . '</td>';
                echo '<td>' . htmlspecialchars($client['sexe']) . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>Aucun client trouvé.</p>';
        }
        ?>
        <form action="../../fpdf/telecharger.php" method="post">
            <button type="submit">
                <i class="fas fa-file-pdf"></i> Télécharger en PDF
            </button>
        </form>
        <br>
        <form action="telecharger_csv.php" method="post">
            <button type="submit">
                <i class="fas fa-file-csv"></i> Télécharger en CSV
            </button>
        </form>
    </div>
    <br>
    <br><br><br><br><br><br>

    <?php include '../../view/footer.php'; ?>
</body>
</html>
