<?php
require_once 'config/database.php';

class Mengontrak {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAll() {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM mengontrak ORDER BY id DESC";
        $result = $conn->query($sql);
        return $result;
    }
    
    public function getAllWithDetails() {
        $conn = $this->db->getConnection();
        $sql = "SELECT m.*, s.name as student_name, s.nim, 
                mk.nama_matkul, mk.kode_matkul 
                FROM mengontrak m 
                JOIN students s ON m.student_id = s.id 
                JOIN mata_kuliah mk ON m.matkul_id = mk.id 
                ORDER BY m.id DESC";
        $result = $conn->query($sql);
        return $result;
    }
    
    public function getById($id) {
        $conn = $this->db->getConnection();
        $id = $this->db->escapeString($id);
        $sql = "SELECT * FROM mengontrak WHERE id = $id";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }
    
    public function getDetailById($id) {
        $conn = $this->db->getConnection();
        $id = $this->db->escapeString($id);
        $sql = "SELECT m.*, s.name as student_name, s.nim, 
                mk.nama_matkul, mk.kode_matkul 
                FROM mengontrak m 
                JOIN students s ON m.student_id = s.id 
                JOIN mata_kuliah mk ON m.matkul_id = mk.id 
                WHERE m.id = $id";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    public function getByMatkulId($matkul_id) {
        $conn = $this->db->getConnection();
        $matkul_id = $this->db->escapeString($matkul_id);
        $sql = "SELECT m.*, s.name, s.nim 
                FROM mengontrak m 
                JOIN students s ON m.student_id = s.id 
                WHERE m.matkul_id = $matkul_id";
        $result = $conn->query($sql);
        return $result;
    }
    
    
    public function create($student_id, $matkul_id, $semester, $tahun_ajaran, $nilai) {
        $conn = $this->db->getConnection();
        $student_id = $this->db->escapeString($student_id);
        $matkul_id = $this->db->escapeString($matkul_id);
        $semester = $this->db->escapeString($semester);
        $tahun_ajaran = $this->db->escapeString($tahun_ajaran);
        $nilai = $this->db->escapeString($nilai);
        
        $sql = "INSERT INTO mengontrak (student_id, matkul_id, semester, tahun_ajaran, nilai) 
                VALUES ('$student_id', '$matkul_id', '$semester', '$tahun_ajaran', '$nilai')";
        return $conn->query($sql);
    }
    
    public function update($id, $student_id, $matkul_id, $semester, $tahun_ajaran, $nilai) {
        $conn = $this->db->getConnection();
        $id = $this->db->escapeString($id);
        $student_id = $this->db->escapeString($student_id);
        $matkul_id = $this->db->escapeString($matkul_id);
        $semester = $this->db->escapeString($semester);
        $tahun_ajaran = $this->db->escapeString($tahun_ajaran);
        $nilai = $this->db->escapeString($nilai);
        
        $sql = "UPDATE mengontrak SET student_id='$student_id', matkul_id='$matkul_id', 
                semester='$semester', tahun_ajaran='$tahun_ajaran', nilai='$nilai' WHERE id=$id";
        return $conn->query($sql);
    }
    
    public function delete($id) {
        $conn = $this->db->getConnection();
        $id = $this->db->escapeString($id);
        $sql = "DELETE FROM mengontrak WHERE id=$id";
        return $conn->query($sql);
    }
    
    public function getByStudentId($student_id) {
        $conn = $this->db->getConnection();
        $student_id = $this->db->escapeString($student_id);
        $sql = "SELECT m.*, mk.nama_matkul, mk.kode_matkul 
                FROM mengontrak m 
                JOIN mata_kuliah mk ON m.matkul_id = mk.id 
                WHERE m.student_id = $student_id";
        $result = $conn->query($sql);
        return $result;
    }
}
?>
