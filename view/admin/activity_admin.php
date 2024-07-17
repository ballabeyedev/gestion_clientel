<?php
require_once('../config/connexion.php');
require_once('../modele/SuperAdminModel.php');
require_once('../controller/SuperAdminController.php');

$database = new Database();
$connect = $database->getConnection();

$model = new SuperAdminModel($connect);
$controller = new SuperAdminController($model);

$logs = $controller->getActivityLogs();

if ($logs === null) {
    die('Erreur: Les données n\'ont pas pu être récupérées.');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/css/superadmins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Logs des Activités | SUPER ADMINISTRATEURS</title>
</head>
<body>
    <?php include '../view/header.php'; ?>
    <br><br><br><br><br>
    <div class="container">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h1 class="balisse">Logs des Activités</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Admin</th>
                    <th>Action</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($logs as $log) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($log['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($log['admin_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($log['action']) . "</td>";
                    echo "<td>" . htmlspecialchars($log['timestamp']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <br><br><br><br><br><br>
    <?php include '../view/footer.php'; ?>
</body>
</html>
