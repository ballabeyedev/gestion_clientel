<?php
class ClientModel {
    private $db;
    //pour pouvoir hydrater
    public function __construct($database) {
        $this->db = $database;
    }

    //requete pour cree un client
    public function AjouterClient($data) {

        // Verifiez si un client avec les memes informations existe deja
        $check_query = "SELECT * FROM clients WHERE email = :email";
        $stmt = $this->db->prepare($check_query);
        $stmt->execute([
            ':email' => $data['email']
        ]);

        // Si le client existe deja, afficher un message d'erreur
        if ($stmt->rowCount() > 0) {
            echo "<div class='unique'>Le client existe déjà avec ces informations. Veuillez vérifier les détails fournis.</div>";
            return false;
        }
        else {
            $query = $this->db->prepare("INSERT INTO clients (prenom, nom, adresse, numero, email, sexe) VALUES (:prenom, :nom, :adresse, :numero, :email, :sexe)");
            return $query->execute([
                ":prenom" => $data['prenom'],
                ":nom" => $data['nom'],
                ":adresse" => $data['adresse'],
                ":numero" => $data['numero'],
                ":email" => $data['email'],
                ":sexe" => $data['sexe'],
            ]);
        }
    }
    
    //requete pour recuperer tous les clients
    public function GetAllClients() {
        $query = $this->db->prepare("SELECT * FROM clients");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //recuperer client par son id
    public function GetClientById($id) {
        $query = $this->db->prepare("SELECT * FROM clients WHERE id = :id");
        $query->execute([":id" => $id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Recuperer les admin avec leur id
    public function GetAdminById($id) {
        $query = $this->db->prepare("SELECT * FROM administrateur WHERE id = :id");
        $query->execute([":id" => $id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // requete modifier Admin
    public function ModifierAdmin($id, $data) {
        $query = $this->db->prepare("UPDATE administrateur SET passwd_admin = :passwd_admin WHERE id = :id");
        return $query->execute([
            ":id" => $id,
            ":passwd_admin" => $data['passwd_admin'],
        ]);
    }

    //requete pour modifier un client 
    public function ModifierClient($id, $data) {
        $query = $this->db->prepare("UPDATE clients SET prenom = :prenom, nom = :nom, adresse = :adresse, numero = :numero, email = :email, sexe = :sexe WHERE id = :id");
        return $query->execute([
            ":id" => $id,
            ":prenom" => $data['prenom'],
            ":nom" => $data['nom'],
            ":adresse" => $data['adresse'],
            ":numero" => $data['numero'],
            ":email" => $data['email'],
            ":sexe" => $data['sexe']
        ]);
    }

    //requete pour supprimer un client 
    public function SupprimerClient($id) {
        $query = $this->db->prepare("DELETE FROM clients WHERE id = :id");
        return $query->execute([":id" => $id]);
    }
    
    //requete pour filtrer les clients par nom, adresse et numero
    public function FiltrerClients($query = '') {
        $query = '%' . $query . '%'; 
        $stmt = $this->db->prepare("
            SELECT * FROM clients
            WHERE 
                nom LIKE :query OR
                prenom LIKE :query OR
                numero LIKE :query OR
                adresse LIKE :query
        ");
        $stmt->execute([':query' => $query]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    //requete pour trier les clients par nom adresse, nmerero et statut
    public function TrierClients($criteres = 'nom', $ordre = 'ASC') {
        $criteres = in_array($criteres, ['nom', 'adresse', 'numero']) ? $criteres : 'nom';
        $ordre = strtoupper($ordre) === 'DESC' ? 'DESC' : 'ASC';
    
        $query = $this->db->prepare("
            SELECT * FROM clients
            ORDER BY $criteres $ordre
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
 

    //bloquer ou debloquer client
    public function bloquerdebloquerclient($clientId, $status) {
        $query = "UPDATE clients SET statut = :statut WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':statut', $status);
        $stmt->bindParam(':id', $clientId);
        return $stmt->execute();
    }
    public function deleteclient($id) {
        try {
            $query = "DELETE FROM clients WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la suppression du client : " . $e->getMessage());
        }
    }
    }

    
?> 
