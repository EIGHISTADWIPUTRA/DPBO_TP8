<?php
require_once 'config/database.php';

class MataKuliah {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAll() {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM mata_kuliah ORDER BY id DESC";
        $result = $conn->query($sql);
        return $result;
    }
    
    public function getById($id) {
        $conn = $this->db->getConnection();
        $id = $this->db->escapeString($id);
        $sql = "SELECT * FROM mata_kuliah WHERE id = $id";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }
    
    public function create($kode_matkul, $nama_matkul, $sks) {
        $conn = $this->db->getConnection();
        $kode_matkul = $this->db->escapeString($kode_matkul);
        $nama_matkul = $this->db->escapeString($nama_matkul);
        $sks = $this->db->escapeString($sks);
        
        $sql = "INSERT INTO mata_kuliah (kode_matkul, nama_matkul, sks) 
                VALUES ('$kode_matkul', '$nama_matkul', '$sks')";
        return $conn->query($sql);
    }
    
    public function update($id, $kode_matkul, $nama_matkul, $sks) {
        $conn = $this->db->getConnection();
        $id = $this->db->escapeString($id);
        $kode_matkul = $this->db->escapeString($kode_matkul);
        $nama_matkul = $this->db->escapeString($nama_matkul);
        $sks = $this->db->escapeString($sks);
        
        $sql = "UPDATE mata_kuliah SET kode_matkul='$kode_matkul', 
                nama_matkul='$nama_matkul', sks='$sks' WHERE id=$id";
        return $conn->query($sql);
    }
    
    public function delete($id) {
        $conn = $this->db->getConnection();
        $id = $this->db->escapeString($id);
        $sql = "DELETE FROM mata_kuliah WHERE id=$id";
        return $conn->query($sql);
    }
}
?>
