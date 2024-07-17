<?php
class SuperAdminModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    //recuperer nombre d'admin
    public function getNumberOfAdmins() {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS nombre_admins FROM administrateur");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['nombre_admins'];
    }

    //recuperer nombre client
    public function getNumberOfClients() {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS nombre_clients FROM clients");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['nombre_clients'];
    }

    public function getStats() {
        $query = "SELECT 
                    (SELECT COUNT(*) FROM administrateur) AS numberOfAdmins,
                    (SELECT COUNT(*) FROM clients) AS numberOfClients";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllAdmins() {
        $query = "SELECT id, prenom, nom, login_admin, passwd_admin FROM administrateur"; 
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getAllClients() {
        $query = "SELECT id, prenom, nom, email FROM clients"; 
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function addAdmin($prenom, $nom, $adresse, $login_admin, $passwdAdmin) {
        try {
            $query = "INSERT INTO administrateur (prenom, nom, adresse, login_admin, passwd_admin) 
                      VALUES (:prenom, :nom, :adresse, :login_admin, :passwd_admin)";
            $stmt = $this->db->prepare($query);
    
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':login_admin', $login_admin);
            $stmt->bindParam(':passwd_admin', $passwdAdmin);
    
            $stmt->execute();
    
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'ajout de l'administrateur : " . $e->getMessage());
        }
    }
    
    public function fetchActivityLogs() {
        $query = "SELECT * FROM activity_admin ORDER BY timestamp DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteAdmin($id) {
        try {
            $query = "DELETE FROM administrateur WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression de l'administrateur : " . $e->getMessage());
        }
    }
    
}
?>
