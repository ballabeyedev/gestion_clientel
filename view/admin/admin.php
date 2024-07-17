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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Acceuil | ADMINISTRATEURS</title>
    <style>
        .password-change {
            width: 80%;
            margin: 20px auto;
            padding: 10px;
            background-color: #ffdddd;
            border-left: 6px solid #f44336;
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: -90px;
        }

        .password-change a {
            color: #f44336;
            text-decoration: none;
            font-weight: bold;
        }

        .password-change a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <?php include '../../view/header.php'; ?>
    <br><br><br><br><br>
    <div class="password-change">
        <p>Pour des raisons de sécurité, veuillez <a href="../admin/change_password.php">changer votre mot de passe</a> régulièrement.</p>
    </div>
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
        <h1 class="balisse">Bienvenue sur la page d'acceuil<br> ADMINISTRATEURS</h1><br>
        <ul class="nav-links">
            <li><a href="../client/creeclient.php">Ajouter un Client</a></li>
            <li><a href="../client/modifsupp.php">Modifier/Supprimer Client </a></li>
            <li><a href="../client/filtrer.php">Filtrer Clients</a></li>
            <li><a href="../client/trier.php">Trier Clients</a></li>
            <li><a href="../client/bloquedeblo.php">Bloquer/Debloquer Client</a></li>
            <li><a href="../client/rapport.php">Cree un rapport pour les Clients</a></li>
            <li><a href="../client/imprimer.php">Importer/ Imprime liste Client</a></li>
        </ul>
        <div class="img_admin"><img src="../../public/image/admin.jpg" alt=""></div>
    </div>
    <br>
    <br><br><br><br><br><br>

    <?php include '../../view/footer.php'; ?>
</body>
</html>
