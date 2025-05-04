<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Detail Mata Kuliah</h5>
        <a href="index.php?controller=mataKuliah&action=index" class="btn btn-secondary btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th width="30%">Kode Mata Kuliah</th>
                        <td width="5%">:</td>
                        <td><?= $mataKuliah['kode_matkul'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama Mata Kuliah</th>
                        <td>:</td>
                        <td><?= $mataKuliah['nama_matkul'] ?></td>
                    </tr>
                    <tr>
                        <th>SKS</th>
                        <td>:</td>
                        <td><?= $mataKuliah['sks'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <?php if(isset($mahasiswaList) && $mahasiswaList->num_rows > 0): ?>
        <div class="mt-4">
            <h5>Daftar Mahasiswa yang Mengontrak</h5>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($row = $mahasiswaList->fetch_assoc()): 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nim'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['semester'] ?></td>
                            <td><?= $row['tahun_ajaran'] ?></td>
                            <td><?= $row['nilai'] ? $row['nilai'] : '-' ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php else: ?>
        <div class="alert alert-info">
            Belum ada mahasiswa yang mengontrak mata kuliah ini.
        </div>
        <?php endif; ?>
    </div>
</div>
