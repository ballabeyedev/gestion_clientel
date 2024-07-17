<?php
// connexion.php
class Database {
    private $host = "mysql-gestionclientel.alwaysdata.net";
    private $db_name = "gestionclientel_examen"; 
    private $username = "369533_clientel";
    private $password = "passer123";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

// Initialisation de la connexion
$database = new Database();
$db = $database->getConnection();
?>
