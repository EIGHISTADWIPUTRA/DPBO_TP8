<?php
date_default_timezone_set('Asia/Jakarta');

require_once 'config/database.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'student';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($controller == 'mataKuliah') {
    $controllerName = 'MataKuliahController';
} else {
    $controllerName = ucfirst($controller) . 'Controller';
}

$controllerFile = 'controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    
    $controllerInstance = new $controllerName();
    
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action($id);
    } else {
        echo "<div class='alert alert-danger'>Error: Action '$action' tidak ditemukan pada controller $controllerName</div>";
        include 'views/layouts/header.php';
        echo "<div class='container mt-5'><h2>Error 404</h2><p>Halaman yang Anda cari tidak ditemukan.</p>";
        echo "<a href='index.php' class='btn btn-primary'>Kembali ke Beranda</a></div>";
        include 'views/layouts/footer.php';
    }
} else {
    include 'views/layouts/header.php';
    echo "<div class='container mt-5'>";
    echo "<div class='alert alert-danger'>Error: Controller '$controllerName' tidak ditemukan</div>";
    echo "<h2>Error 404</h2><p>Halaman yang Anda cari tidak ditemukan.</p>";
    echo "<a href='index.php' class='btn btn-primary'>Kembali ke Beranda</a>";
    echo "</div>";
    include 'views/layouts/footer.php';
}
?>
