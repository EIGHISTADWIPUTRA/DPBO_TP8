<div class="card">
    <div class="card-header">
        <h5>Tambah Kontrak Mata Kuliah</h5>
    </div>
    <div class="card-body">
        <form action="index.php?controller=mengontrak&action=create" method="POST">
            <div class="mb-3">
                <label for="student_id" class="form-label">Mahasiswa</label>
                <select class="form-select" id="student_id" name="student_id" required>
                    <option value="">-- Pilih Mahasiswa --</option>
                    <?php while ($student = $students->fetch_assoc()) { ?>
                        <option value="<?= $student['id'] ?>">
                            <?= $student['nim'] ?> - <?= $student['name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="matkul_id" class="form-label">Mata Kuliah</label>
                <select class="form-select" id="matkul_id" name="matkul_id" required>
                    <option value="">-- Pilih Mata Kuliah --</option>
                    <?php while ($matkul = $mataKuliahs->fetch_assoc()) { ?>
                        <option value="<?= $matkul['id'] ?>">
                            <?= $matkul['kode_matkul'] ?> - <?= $matkul['nama_matkul'] ?> (<?= $matkul['sks'] ?> SKS)
                        </option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <select class="form-select" id="semester" name="semester" required>
                    <option value="">-- Pilih Semester --</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Contoh: 2023/2024" required>
            </div>
            
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai (Opsional)</label>
                <select class="form-select" id="nilai" name="nilai">
                    <option value="">-- Pilih Nilai --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="index.php?controller=mengontrak&action=index" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
