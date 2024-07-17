<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserByLoginAndPassword($login, $password) {
        $sql = "SELECT *, 'admin' as role FROM administrateur WHERE login_admin = :login AND passwd_admin = :password
                UNION
                SELECT *, 'superadmin' as role FROM superadmin WHERE login_superadmin = :login AND password_superadmin = :password";
        
        $query = $this->db->prepare($sql);
        $query->execute(['login' => $login, 'password' => $password]);
        return $query->fetch();
    }
}
?>
