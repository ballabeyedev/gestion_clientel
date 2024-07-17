<?php
require_once("../../config/connexion.php");
require_once("../../modele/ClientModel.php");
require_once("../../controller/ClientController.php");

$database = new Database();
$db = $database->getConnection();
$model = new ClientModel($db);
$controller = new ClientController($model);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clientId = $_POST['client_id'];
    $newStatus = $_POST['new_status'];
    $controller->bloquerdebloquerclient($clientId, $newStatus);
    header("Location: ../client/bloquedeblo.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/header.css">
    <link rel="stylesheet" href="../../public/css/footers.css">
    <link rel="stylesheet" href="../../public/css/modifierr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Acceuil | ADMINISTRATEURS | BLOQUER/DEBLOQUER</title>
    <style>
        .container {
            margin-left: 250px;
            margin-top: -250px;
            width: 80%;
            padding: 10px;
            height: 540px;
            margin-left: 130px;
            margin-top: 10px;
        }
        .button-group button {
            display: flex;
            align-items: center;
            margin: 0 5px; /* Espacement entre les boutons */
        }
        .button-group i {
            margin-right: 5px; /* Espacement entre l'icône et le texte */
        }
    </style>
</head>
<body>
    <?php include '../../view/header.php'; ?>
    <br><br><br>
    <div class="container">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h3>BLOQUER/DEBLOQUER CLIENT</h3><br>

        <?php
        $clients = $controller->GetAllClients();
        if (!empty($clients)) {
            echo '<table>';
            echo '<thead><tr><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Numéro</th><th>Email</th><th>Sexe</th><th>Statut</th><th>Actions</th></tr></thead>';
            echo '<tbody>';
            foreach ($clients as $client) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($client['nom']) . '</td>';
                echo '<td>' . htmlspecialchars($client['prenom']) . '</td>';
                echo '<td>' . htmlspecialchars($client['adresse']) . '</td>';
                echo '<td>' . htmlspecialchars($client['numero']) . '</td>';
                echo '<td>' . htmlspecialchars($client['email']) . '</td>';
                echo '<td>' . htmlspecialchars($client['sexe']) . '</td>';
                echo '<td>' . htmlspecialchars($client['statut']) . '</td>';
                echo '<td>';
                echo '<div class="button-group">';
                echo '<form method="post" action="../client/bloquedeblo.php" style="display:inline-block;">';
                echo '<input type="hidden" name="client_id" value="' . $client['id'] . '">';
                echo '<input type="hidden" name="new_status" value="inactif">';
                echo '<button type="submit"><i class="fas fa-lock"></i> Bloquer</button>';
                echo '</form>';
                echo '<form method="post" action="../client/bloquedeblo.php" style="display:inline-block;">';
                echo '<input type="hidden" name="client_id" value="' . $client['id'] . '">';
                echo '<input type="hidden" name="new_status" value="actif">';
                echo '<button type="submit"><i class="fas fa-unlock"></i> Débloquer</button>';
                echo '</form>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>Aucun client trouvé.</p>';
        }
        ?>
    </div>
    <br><br><br><br><br><br>

    <?php include '../../view/footer.php'; ?>
</body>
</html>
