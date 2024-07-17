<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

require_once('../modele/Usermodel.php');
require_once('../controller/SuperadminController.php');

$userInfo = getUserInfo($_SESSION['login']);

require_once('../view/superadmin.php');
?>
