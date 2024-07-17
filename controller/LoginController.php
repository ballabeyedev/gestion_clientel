<?php
session_start();
require_once('../config/connexion.php');
require_once('../modele/LoginModel.php');

$database = new Database();
$connect = $database->getConnection();

$userModel = new UserModel($connect);

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login']) && isset($_POST['passwd'])) {
        $login = $_POST['login'];
        $password = $_POST['passwd'];

        $user = $userModel->getUserByLoginAndPassword($login, $password);

        if ($user) {
            $_SESSION['login'] = $login;
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === "admin") {
                header("Location: ../view/admin/admin.php");
                exit();
            } elseif ($user['role'] === "superadmin") {
                header("Location: ../view/superadmin/superadmin.php");
                exit();
            }
        } else {
            $error = "Cet utilisateur n'existe pas ou le mot de passe est incorrect.";
            $_SESSION['error'] = $error;
            header("Location: ../index.php");
            exit();
        }
    }
}
?>
