<?php
require_once('../../config/connexion.php');
require_once('../../modele/SuperAdminModel.php');
require_once('../../controller/SuperAdminController.php');

$database = new Database();
$connect = $database->getConnection();

$model = new SuperAdminModel($connect);
$controller = new SuperAdminController($model);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $success = $controller->deleteAdmin($id);
    if ($success) {
        header('Location: superadmin/superadmin.php');
    } else {
        echo "Erreur lors de la suppression de l'administrateur.";
    }
} else {
    echo "ID d'administrateur manquant.";
}
?>
