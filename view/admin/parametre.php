<?php
session_start(); 

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit(); 
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
    <link rel="stylesheet" href="../../public/css/parametre.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Accueil | ADMINISTRATEURS | PARAMETRE</title>
</head>
<body>
    <?php include '../../view/header.php'; ?>
    <br><br>

    <div class="container">
        <a href="javascript:history.back()">RETOUR</a>
        <h1 class="balisse">PAGE PARAMETRE</h1>
        <div class="links">
            <div id="link1" class="active" onclick="showContent('content1', 'link1')">
                <h3>LANGUE</h3>
            </div>
            <div id="link2" onclick="showContent('content2', 'link2')">
                <h3>Réglages</h3>
            </div>
            <div id="link3" onclick="showContent('content3', 'link3')">
                <h3>Notifications</h3>
            </div>
            <div id="link4" onclick="showContent('content4', 'link4')">
                <h3>Thème</h3>
            </div>
            <div id="link5" onclick="showContent('content5', 'link5')">
                <h3>Accessibilité</h3>
            </div>
        </div>

        <div id="content1" class="hidden-content visible">
            <h2>Choisir la Langue</h2>
            <select id="languageSelect" class="btn">
                <option value="en">Anglais</option>
                <option value="fr">Français</option>
                <option value="es">Espagnol</option>
            </select>
        </div>

        <div id="content2" class="hidden-content">
            <h2>Réglages</h2>
            <div class="setting">
                <label for="brightness">Luminosité:</label>
                <input type="range" id="brightness" name="brightness" min="0" max="100" value="50" class="slider">
                <span id="brightnessValue">50</span>
            </div>
            <div class="setting">
                <label for="volume">Volume:</label>
                <input type="range" id="volume" name="volume" min="0" max="100" value="50" class="slider">
                <span id="volumeValue">50</span>
            </div>
        </div>

        <div id="content3" class="hidden-content">
            <h2>Notifications</h2>
            <div class="notification-option">
                <input type="checkbox" id="emailNotifications" name="emailNotifications">
                <label for="emailNotifications">Notifications par e-mail</label>
            </div>
            <div class="notification-option">
                <input type="checkbox" id="smsNotifications" name="smsNotifications">
                <label for="smsNotifications">Notifications par SMS</label>
            </div>
            <div class="notification-option">
                <input type="checkbox" id="appNotifications" name="appNotifications">
                <label for="appNotifications">Notifications dans l'application</label>
            </div>
        </div>

        <div id="content4" class="hidden-content">
            <h2>Thème</h2>
            <div class="setting">
                <label for="themeSelect">Choisir le Thème:</label>
                <select id="themeSelect" class="btn">
                    <option value="light">Clair</option>
                    <option value="dark">Sombre</option>
                </select>
            </div>
        </div>

        <div id="content5" class="hidden-content">
            <h2>Accessibilité</h2>
            <div class="setting">
                <label for="fontSize">Taille de la Police:</label>
                <input type="range" id="fontSize" name="fontSize" min="12" max="24" value="16" class="slider">
                <span id="fontSizeValue">16px</span>
            </div>
            <div class="setting">
                <label for="contrast">Contraste:</label>
                <input type="range" id="contrast" name="contrast" min="1" max="3" value="1" class="slider">
                <span id="contrastValue">1</span>
            </div>
        </div>
    </div>

    <script src="../../public/js/parametre.js" defer></script>
    
    <br><br><br><br><br>

    <?php include '../../view/footer.php'; ?>
</body>
</html>
