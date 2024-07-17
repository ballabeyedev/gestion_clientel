<?php
require_once '../../modele/ClientModel.php'; 
require_once '../../config/connexion.php';

$model = new ClientModel($db);
$users = $model->GetAllClients();

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=utilisateurs.csv');

$output = fopen('php://output', 'w');

fputcsv($output, array('Prenom', 'Nom', 'Email', 'Numero', 'Adresse', 'Sexe'));

foreach ($users as $user) {
    $prenom = isset($user['prenom']) ? $user['prenom'] : '';
    $nom = isset($user['nom']) ? $user['nom'] : '';
    $email = isset($user['email']) ? $user['email'] : '';
    $numero = isset($user['numero']) ? $user['numero'] : '';
    $adresse = isset($user['adresse']) ? $user['adresse'] : '';
    $sexe = isset($user['sexe']) ? $user['sexe'] : '';
    fputcsv($output, array($prenom, $nom, $email, $numero, $adresse, $sexe));
}

fclose($output);
?>
