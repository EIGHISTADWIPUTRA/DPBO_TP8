<?php
require_once 'models/Student.php';

class StudentController {
    private $model;
    
    public function __construct() {
        $this->model = new Student();
    }
    
    public function index() {
        $pageTitle = "Daftar Mahasiswa";
        $students = $this->model->getAll();
        include 'views/layouts/header.php';
        include 'views/students/index.php';
        include 'views/layouts/footer.php';
    }
    
    public function create() {
        $pageTitle = "Tambah Mahasiswa";
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $nim = $_POST['nim'];
            $phone = $_POST['phone'];
            $join_date = $_POST['join_date'];
            
            if ($this->model->create($name, $nim, $phone, $join_date)) {
                header('Location: index.php?controller=student&action=index');
                exit;
            } else {
                $error = "Gagal menambahkan data mahasiswa";
            }
        }
        
        include 'views/layouts/header.php';
        include 'views/students/create.php';
        include 'views/layouts/footer.php';
    }
    
    public function edit($id = null) {
        if ($id === null) {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
        }
        
        if ($id === null) {
            header('Location: index.php?controller=student&action=index');
            exit;
        }
        
        $pageTitle = "Edit Mahasiswa";
        $student = $this->model->getById($id);
        
        if (!$student) {
            header('Location: index.php?controller=student&action=index');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $nim = $_POST['nim'];
            $phone = $_POST['phone'];
            $join_date = $_POST['join_date'];
            
            if ($this->model->update($id, $name, $nim, $phone, $join_date)) {
                header('Location: index.php?controller=student&action=index');
                exit;
            }
        }
        
        include 'views/layouts/header.php';
        include 'views/students/edit.php';
        include 'views/layouts/footer.php';
    }
    
    public function show($id = null) {
        if ($id === null) {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
        }
        
        if ($id === null) {
            header('Location: index.php?controller=student&action=index');
            exit;
        }
        
        $pageTitle = "Detail Mahasiswa";
        $student = $this->model->getById($id);
        
        if (!$student) {
            header('Location: index.php?controller=student&action=index');
            exit;
        }
        
        require_once 'models/Mengontrak.php';
        $mengontrakModel = new Mengontrak();
        $kontrakList = $mengontrakModel->getByStudentId($id);
        
        include 'views/layouts/header.php';
        include 'views/students/show.php';
        include 'views/layouts/footer.php';
    }
    
    public function delete($id = null) {
        if ($id === null) {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
        }
        
        if ($id === null) {
            header('Location: index.php?controller=student&action=index');
            exit;
        }
        
        if ($this->model->delete($id)) {
            header('Location: index.php?controller=student&action=index');
            exit;
        }
    }
}
?>
