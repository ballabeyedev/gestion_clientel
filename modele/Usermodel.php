<?php

require_once('../../config/connexion1.php');

/**
 * @param string $login Le login de l'utilisateur
 * @return array Les informations de l'utilisateur sous forme de tableau associatif
 */
function getUserInfo($login) {
    global $connect;

    // Initialiser le tableau des informations utilisateur
    $userInfo = array();

    $stmt = $connect->prepare("SELECT id, nom, prenom, role FROM administrateur WHERE login_admin = :login");
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $userInfo['id'] = htmlspecialchars($row['id']);
        $userInfo['nom'] = htmlspecialchars($row['nom']);
        $userInfo['prenom'] = htmlspecialchars($row['prenom']);
        $userInfo['role'] = htmlspecialchars($row['role']);
    } else {
        $stmt = $connect->prepare("SELECT nom, prenom, role FROM superadmin WHERE login_superadmin = :login");
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $userInfo['nom'] = htmlspecialchars($row['nom']);
            $userInfo['prenom'] = htmlspecialchars($row['prenom']);
            $userInfo['role'] = htmlspecialchars($row['role']);
        } else {
            $userInfo['error'] = "Utilisateur non trouvé";
        }
    }

    return $userInfo;
}

/**
 * Met à jour le mot de passe de l'administrateur sans hachage
 *
 * @param int $id L'identifiant de l'utilisateur
 * @param string $newPassword Le nouveau mot de passe de l'utilisateur
 * @return bool Vrai si la mise à jour a réussi, faux sinon
 */
function updatePassword($id, $newPassword) {
    global $connect;

    $stmt = $connect->prepare("UPDATE administrateur SET passwd_admin = :passwd_admin WHERE id = :id");
    $stmt->bindParam(':passwd_admin', $newPassword, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
}

?>
