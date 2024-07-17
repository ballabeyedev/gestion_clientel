<?php
require_once('../../config/connexion.php');
require_once('../../modele/Usermodel.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$login = isset($_SESSION['login']) ? $_SESSION['login'] : '';

$userInfo = getUserInfo($login);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        if (updatePassword($userInfo['id'], $newPassword)) {
            $message = "Mot de passe mis à jour avec succès.";
        } else {
            $message = "Erreur lors de la mise à jour du mot de passe.";
        }
    } else {
        $message = "Les mots de passe ne correspondent pas.";
    }
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
    <link rel="stylesheet" href="../../public/css/changerpassword.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Accueil | ADMINISTRATEURS | CHANGER MOT DE PASSE</title>
</head>
<body>
    <?php include '../../view/header.php'; ?>
    <br><br>
    <br><br>
    <div class="barreee">
        <div class="logo-holder">
            <div class="bg"></div>
            <div class="bar"></div>
            <div class="bar fill1"></div>
            <div class="bar fill2"></div>
            <div class="bar fill3"></div>
            <div class="bar fill4"></div>
            <div class="bar fill1"></div>
            <div class="bar fill5"></div>
            <div class="bar fill6"></div>
            <div class="bar"></div>
        </div>
    </div>
    <div class="container">
        <a href="javascript:history.go(-1)">RETOUR</a>
        <h2 class="balisse">CHANGER VOTRE MOT DE PASSE/ PASSWORD</h2><br>
        <div class="user-info">
            <?php if (isset($message)): ?>
                <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
            <form action="" method="post">
               <div class="input-group">
                   <input type="password" name="new_password" id="new_password" placeholder="Nouveau Mot de passe">
                   <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('new_password')"></i>
                   <span class="remove-line" onclick="removeLine(this)"><i class="fas fa-trash"></i></span>
               </div>
               <div class="input-group">
                   <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmer le Mot de passe">
                   <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('confirm_password')"></i>
                   <span class="remove-line" onclick="removeLine(this)"><i class="fas fa-trash"></i></span>
               </div>
               <button type="submit">Changer le mot de passe</button>
            </form>
        </div>
    </div>
    <br>
    <br><br><br><br><br><br>

    <?php include '../../view/footer.php'; ?>
    <script>
        function togglePasswordVisibility(id) {
            const input = document.getElementById(id);
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
        }

        function removeLine(element) {
            const inputGroup = element.parentElement;
            inputGroup.remove();
        }
    </script>
</body>
</html>
