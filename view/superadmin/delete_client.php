<?php
require_once('../../config/connexion.php');
require_once('../../modele/ClientModel.php');
require_once('../../controller/ClientController.php');

$database = new Database();
$connect = $database->getConnection();

$model = new ClientModel($connect);
$controller = new ClientController($model);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $success = $controller->deleteclient($id);
    if ($success) {
        header('Location: ../superadmin/superadmin.php');
    } else {
        echo "Erreur lors de la suppression du client.";
    }
} else {
    echo "ID de client manquant.";
}
?>
