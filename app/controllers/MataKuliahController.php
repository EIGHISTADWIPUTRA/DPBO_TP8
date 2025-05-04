<?php
require_once 'models/MataKuliah.php';

class MataKuliahController {
    private $model;
    
    public function __construct() {
        $this->model = new MataKuliah();
    }
    
    public function index() {
        $pageTitle = "Daftar Mata Kuliah";
        $mataKuliahs = $this->model->getAll();
        include 'views/layouts/header.php';
        include 'views/mata_kuliah/index.php';
        include 'views/layouts/footer.php';
    }
    
    public function create() {
        $pageTitle = "Tambah Mata Kuliah";
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_matkul = $_POST['kode_matkul'];
            $nama_matkul = $_POST['nama_matkul'];
            $sks = $_POST['sks'];
            
            if ($this->model->create($kode_matkul, $nama_matkul, $sks)) {
                header('Location: index.php?controller=mataKuliah&action=index');
                exit;
            } else {
                $error = "Gagal menambahkan data mata kuliah";
            }
        }
        
        include 'views/layouts/header.php';
        include 'views/mata_kuliah/create.php';
        include 'views/layouts/footer.php';
    }
    
    public function edit($id = null) {
        if ($id === null) {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
        }
        
        if ($id === null) {
            header('Location: index.php?controller=mataKuliah&action=index');
            exit;
        }
        
        $pageTitle = "Edit Mata Kuliah";
        $mataKuliah = $this->model->getById($id);
        
        if (!$mataKuliah) {
            header('Location: index.php?controller=mataKuliah&action=index');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_matkul = $_POST['kode_matkul'];
            $nama_matkul = $_POST['nama_matkul'];
            $sks = $_POST['sks'];
            
            if ($this->model->update($id, $kode_matkul, $nama_matkul, $sks)) {
                header('Location: index.php?controller=mataKuliah&action=index');
                exit;
            }
        }
        
        include 'views/layouts/header.php';
        include 'views/mata_kuliah/edit.php';
        include 'views/layouts/footer.php';
    }
    
    public function show($id = null) {
        if ($id === null) {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
        }
        
        if ($id === null) {
            header('Location: index.php?controller=mataKuliah&action=index');
            exit;
        }
        
        $pageTitle = "Detail Mata Kuliah";
        $mataKuliah = $this->model->getById($id);
        
        if (!$mataKuliah) {
            header('Location: index.php?controller=mataKuliah&action=index');
            exit;
        }
        
        require_once 'models/Mengontrak.php';
        $mengontrakModel = new Mengontrak();
        $mahasiswaList = $mengontrakModel->getByMatkulId($id);
        
        include 'views/layouts/header.php';
        include 'views/mata_kuliah/show.php';
        include 'views/layouts/footer.php';
    }
    
    
    public function delete($id = null) {
        if ($id === null) {
            $id = isset($_GET['id']) ? $_GET['id'] : null;
        }
        
        if ($id === null) {
            header('Location: index.php?controller=mataKuliah&action=index');
            exit;
        }
        
        if ($this->model->delete($id)) {
            header('Location: index.php?controller=mataKuliah&action=index');
            exit;
        }
    }
}
?>
