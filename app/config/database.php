<?php
class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = ''; 
    private $database = 'db_mvc';
    private $conn;

    public function __construct() {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if ($this->conn->connect_error) {
                throw new Exception("Koneksi database gagal: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    public function escapeString($data) {
        return $this->conn->real_escape_string($data);
    }
}
?>
