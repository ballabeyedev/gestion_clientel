<?php 
require_once("../../config/connexion.php");
require_once("../../modele/ClientModel.php");
require_once("../../controller/ClientController.php");

$database = new Database();
$db = $database->getConnection();
$model = new ClientModel($db);
$controller = new ClientController($model);

$client = null;

if (isset($_GET['edit_id'])) {
    $client = $model->GetClientById($_GET['edit_id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'adresse' => $_POST['adresse'],
        'numero' => $_POST['numero'],
        'email' => $_POST['email'],
        'sexe' => $_POST['sexe']
    ];
    $controller->ModifierClient($_POST['id'], $data);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/header.css">
    <link rel="stylesheet" href="../../public/css/footers.css">
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Acceuil | ADMINISTRATEURS | MODIFIER CLIENT</title>
</head>
<body>
    <?php include '../../view/header.php'; ?>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
        <h3>MODIFIER UN CLIENT</h3>
        <a href="javascript:history.go(-1)">RETOUR</a>
        <form id="clientForm" action="" method="post">
            <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
            <div class="input-container">
                <input type="text" placeholder="Nom" name="nom" value="<?php echo $client['nom']; ?>" required>
                <span class="required-message">* Champ obligatoire</span>
            </div>
            <div class="input-container">
                <input type="text" placeholder="Prénom" name="prenom" value="<?php echo $client['prenom']; ?>" required>
                <span class="required-message">* Champ obligatoire</span>
            </div>
            <div class="input-container">
                <input type="text" placeholder="Adresse" name="adresse" value="<?php echo $client['adresse']; ?>" required>
                <span class="required-message">* Champ obligatoire</span>
            </div>
            <div class="input-container">
                <input type="text" placeholder="Numéro de Téléphone" name="numero" value="<?php echo $client['numero']; ?>" required>
                <span class="required-message">* Champ obligatoire</span>
            </div>
            <div class="input-container">
                <input type="email" placeholder="Adresse E-mail" name="email" value="<?php echo $client['email']; ?>" required>
                <span class="required-message">* Champ obligatoire</span>
            </div>
            <div class="input-container">
                <select name="sexe" id="sexe" required>
                    <option value="" disabled>Sexe</option>
                    <option value="M" <?php if ($client['sexe'] == 'M') echo 'selected'; ?>>M</option>
                    <option value="F" <?php if ($client['sexe'] == 'F') echo 'selected'; ?>>F</option>
                </select>
                <span class="required-message">* Champ obligatoire</span>
            </div>
            <button type="submit">MODIFIER CLIENT</button>
        </form>
    </div>
    <br><br><br><br><br><br><br><br>
    <script src="../../public/js/ajoutclient.js" defer></script>
    <?php include '../../view/footer.php'; ?>
</body>
</html>
