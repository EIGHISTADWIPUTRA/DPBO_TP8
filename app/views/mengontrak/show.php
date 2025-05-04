<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Detail Kontrak Mata Kuliah</h5>
        <a href="index.php?controller=mengontrak&action=index" class="btn btn-secondary btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h6 class="border-bottom pb-2 mb-3">Data Mahasiswa</h6>
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">NIM</th>
                        <td width="5%">:</td>
                        <td><?= $mengontrak['nim'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <td>:</td>
                        <td><?= $mengontrak['student_name'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h6 class="border-bottom pb-2 mb-3">Data Mata Kuliah</h6>
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">Kode Mata Kuliah</th>
                        <td width="5%">:</td>
                        <td><?= $mengontrak['kode_matkul'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama Mata Kuliah</th>
                        <td>:</td>
                        <td><?= $mengontrak['nama_matkul'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-12">
                <h6 class="border-bottom pb-2 mb-3">Data Kontrak</h6>
                <table class="table table-borderless">
                    <tr>
                        <th width="20%">Semester</th>
                        <td width="5%">:</td>
                        <td><?= $mengontrak['semester'] ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <td>:</td>
                        <td><?= $mengontrak['tahun_ajaran'] ?></td>
                    </tr>
                    <tr>
                        <th>Nilai</th>
                        <td>:</td>
                        <td><?= $mengontrak['nilai'] ? $mengontrak['nilai'] : 'Belum ada nilai' ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-12 d-flex gap-2">
                <a href="index.php?controller=mengontrak&action=edit&id=<?= $mengontrak['id'] ?>" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="index.php?controller=mengontrak&action=delete&id=<?= $mengontrak['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    <i class="bi bi-trash"></i> Hapus
                </a>
            </div>
        </div>
    </div>
</div>
