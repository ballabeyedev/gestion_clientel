<?php
    session_start();
    $error = isset($_SESSION['error']) ? $_SESSION['error'] : "";
    unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGE CONNECTION</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="public/css/login.css" />
</head>
<body>
    <div class="container">
        <div class="content-left">
            <h2 class="title">S'identifier</h2>
            <form id="myform" action="controller/LoginController.php" method="post">
                <div class="box">
                    <input type="text" id="login" name="login" placeholder="identifiant" required/>
                </div>
                <div class="box">
                    <input type="password" id="passwd" name="passwd" placeholder="mot de passe" required/>
                </div>
                <div class="error-message" id="error-message"><?= $error ?></div><br>
                <div class="box">
                    <input type="submit" id="envoyer" value="SE CONNECTER"/>
                </div>
            </form>
        </div>
        <div class="content-right">
            <h2>Bienvenue</h2>
            <p>Accédez à l'interface d'administration pour gérer vos ventes en ligne, suivre les commandes, gérer les clients et améliorer l'expérience client.</p>
            <div class="icon-list">
                <i class="fas fa-cogs" title="Gestion des paramètres"></i>
                <i class="fas fa-box" title="Suivi des commandes"></i>
                <i class="fas fa-warehouse" title="Gestion des stocks"></i>
                <i class="fas fa-users" title="Gestion des clients"></i>
                <i class="fas fa-chart-line" title="Analyse des ventes"></i>
            </div>
        </div>
    </div>
    <script src="public/js/index.js" defer></script>
</body>
</html>
