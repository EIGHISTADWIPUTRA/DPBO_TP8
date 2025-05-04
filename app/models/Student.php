<?php
require_once 'config/database.php';

class Student {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAll() {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM students ORDER BY id DESC";
        $result = $conn->query($sql);
        return $result;
    }
    
    public function getById($id) {
        $conn = $this->db->getConnection();
        $id = $this->db->escapeString($id);
        $sql = "SELECT * FROM students WHERE id = $id";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }
    
    public function create($name, $nim, $phone, $join_date) {
        $conn = $this->db->getConnection();
        $name = $this->db->escapeString($name);
        $nim = $this->db->escapeString($nim);
        $phone = $this->db->escapeString($phone);
        $join_date = $this->db->escapeString($join_date);
        
        $sql = "INSERT INTO students (name, nim, phone, join_date) 
                VALUES ('$name', '$nim', '$phone', '$join_date')";
        return $conn->query($sql);
    }
    
    public function update($id, $name, $nim, $phone, $join_date) {
        $conn = $this->db->getConnection();
        $id = $this->db->escapeString($id);
        $name = $this->db->escapeString($name);
        $nim = $this->db->escapeString($nim);
        $phone = $this->db->escapeString($phone);
        $join_date = $this->db->escapeString($join_date);
        
        $sql = "UPDATE students SET name='$name', nim='$nim', 
                phone='$phone', join_date='$join_date' WHERE id=$id";
        return $conn->query($sql);
    }
    
    public function delete($id) {
        $conn = $this->db->getConnection();
        $id = $this->db->escapeString($id);
        $sql = "DELETE FROM students WHERE id=$id";
        return $conn->query($sql);
    }
}
?>
