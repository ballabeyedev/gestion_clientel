<?php
require_once('../../config/connexion.php');
require_once('../../modele/Usermodel.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$login = isset($_SESSION['login']) ? $_SESSION['login'] : '';

$userInfo = getUserInfo($login);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title></title>
</head>
<body>
    <div class="entete">
        <div class="localite">
            <span><i class="fas fa-map-marker-alt"></i> &nbsp; Senegal, Dakar</span>
        </div>
        <div class="contact">
            <span><i class="fas fa-phone"></i> &nbsp; +221 77-000-00-00</span>
        </div>
        <div class="mail">
            <span><i class="fas fa-envelope"></i> &nbsp; contact@mourideshop.sn</span>
        </div>
        <div class="heure">
            <span><i class="fas fa-clock"></i> &nbsp; Lun - Dim: 24H/24</span>
        </div>
    </div>
    <div class="logo">
        <div class="logo1">
            <img src="../../public/image/logo.png" alt="">
        </div>
        <ul>
            <div class="liens">
                <li><a href="#">Menu</a></li>
                <li><a href="../admin/parametre.php">Paramètres</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Contact</a></li>
                <li>
                    <a href="../../index.php" onclick="return(confirm('Vous vous déconnectez ?'));">
                        <button type="submit"  class="disconnect">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </button>
                    </a>
                </li>
            </div>
        </ul>
        <div class="gr">
            <div class="search-bar">
                <input type="text" placeholder="Rechercher...">
            </div>
        </div>
        <div class="profil">
            <a href="#">
                <i class="fas fa-user-circle fa-3x"></i>
            </a>
            <br>
            <div class="user-info">
                <?php if (isset($userInfo['error'])): ?>
                <p><?php echo $userInfo['error']; ?></p>
                <?php else: ?>
                <p>
                    <?php echo $userInfo['nom']; ?>
                    <?php echo $userInfo['prenom']; ?>
                </p>
                <p class="user-role">
                    <?php echo $userInfo['role']; ?>
                </p>
                <?php endif; ?>
            </div>
            <select id="menu-deroulant" onchange="handleMenuChange(this)">
                <option value=""></option>
                <option value="profils">PROFILS</option>
                <option value="deconnexion">DECONNEXION</option>
            </select>
        </div>
    </div>
    </div>
    <script>
        document.getElementById('menu-deroulant').onchange = function() {
            var selectedValue = this.value;
            if (selectedValue === 'profils') {
                window.location.href = '../profils.php';
            } else if (selectedValue === 'deconnexion') {
                window.location.href = '../../index.php';
            }
        };
    </script>
</body>
</html>
