<div class="card">
    <div class="card-header">
        <h5>Tambah Mahasiswa</h5>
    </div>
    <div class="card-body">
        <form action="index.php?controller=student&action=create" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            
            <div class="mb-3">
                <label for="join_date" class="form-label">Tanggal Bergabung</label>
                <input type="date" class="form-control" id="join_date" name="join_date" required>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="index.php?controller=student&action=index" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
