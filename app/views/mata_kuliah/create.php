<div class="card">
    <div class="card-header">
        <h5>Tambah Mata Kuliah</h5>
    </div>
    <div class="card-body">
        <form action="index.php?controller=mataKuliah&action=create" method="POST">
            <div class="mb-3">
                <label for="kode_matkul" class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" required>
            </div>
            
            <div class="mb-3">
                <label for="nama_matkul" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" required>
            </div>
            
            <div class="mb-3">
                <label for="sks" class="form-label">SKS</label>
                <input type="number" class="form-control" id="sks" name="sks" min="1" max="6" required>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="index.php?controller=mataKuliah&action=index" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
