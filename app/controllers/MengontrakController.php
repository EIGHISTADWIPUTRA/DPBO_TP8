<?php
require_once 'models/Mengontrak.php';
require_once 'models/Student.php';
require_once 'models/MataKuliah.php';

class MengontrakController {
    private $model;
    private $studentModel;
    private $mataKuliahModel;
    
    public function __construct() {
        $this->model = new Mengontrak();
        $this->studentModel = new Student();
        $this->mataKuliahModel = new MataKuliah();
    }
    
    public function index() {
        $pageTitle = "Daftar Kontrak Mata Kuliah";
        $mengontraks = $this->model->getAllWithDetails();
        include 'views/layouts/header.php';
        include 'views/mengontrak/index.php';
        include 'views/layouts/footer.php';
    }
    
    public function create() {
        $pageTitle = "Tambah Kontrak Mata Kuliah";
        
        $students = $this->studentModel->getAll();
        $mataKuliahs = $this->mataKuliahModel->getAll();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student_id = $_POST['student_id'];
            $matkul_id = $_POST['matkul_id'];
            $semester = $_POST['semester'];
            $tahun_ajaran = $_POST['tahun_ajaran'];
            $nilai = $_POST['nilai'];
            
            if ($this->model->create($student_id, $matkul_id, $semester, $tahun_ajaran, $nilai)) {
                header('Location: index.php?controller=mengontrak&action=index');
                exit;
            } else {
                $error = "Gagal menambahkan data kontrak mata kuliah";
            }
        }
        
        include 'views/layouts/header.php';
        include 'views/mengontrak/create.php';
        include 'views/layouts/footer.php';
    }
    
    public function edit($id = null) {
        if ($id === null) {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
        }
        
        if ($id === null) {
            header('Location: index.php?controller=mengontrak&action=index');
            exit;
        }
        
        $pageTitle = "Edit Kontrak Mata Kuliah";
        $mengontrak = $this->model->getById($id);
        
        if (!$mengontrak) {
            header('Location: index.php?controller=mengontrak&action=index');
            exit;
        }
        
        
        $students = $this->studentModel->getAll();
        $mataKuliahs = $this->mataKuliahModel->getAll();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student_id = $_POST['student_id'];
            $matkul_id = $_POST['matkul_id'];
            $semester = $_POST['semester'];
            $tahun_ajaran = $_POST['tahun_ajaran'];
            $nilai = $_POST['nilai'];
            
            if ($this->model->update($id, $student_id, $matkul_id, $semester, $tahun_ajaran, $nilai)) {
                header('Location: index.php?controller=mengontrak&action=index');
                exit;
            }
        }
        
        include 'views/layouts/header.php';
        include 'views/mengontrak/edit.php';
        include 'views/layouts/footer.php';
    }
    
    public function show($id = null) {
        if ($id === null) {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
        }
        
        if ($id === null) {
            header('Location: index.php?controller=mengontrak&action=index');
            exit;
        }
        
        $pageTitle = "Detail Kontrak Mata Kuliah";
        $mengontrak = $this->model->getDetailById($id);
        
        if (!$mengontrak) {
            header('Location: index.php?controller=mengontrak&action=index');
            exit;
        }
        
        include 'views/layouts/header.php';
        include 'views/mengontrak/show.php';
        include 'views/layouts/footer.php';
    }
    
    public function delete($id = null) {
        if ($id === null) {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
        }
        
        if ($id === null) {
            header('Location: index.php?controller=mengontrak&action=index');
            exit;
        }
        
        if ($this->model->delete($id)) {
            header('Location: index.php?controller=mengontrak&action=index');
            exit;
        }
    }
}
?>
