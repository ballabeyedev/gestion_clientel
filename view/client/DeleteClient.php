<?php
require_once("../../config/connexion.php");
require_once("../../modele/ClientModel.php");
require_once("../../controller/ClientController.php");

$database = new Database();
$db = $database->getConnection();
$model = new ClientModel($db);
$controller = new ClientController($model);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $controller->SupprimerClient($id);
}

header('Location: ../client/modifsupp.php');
exit();
?>
