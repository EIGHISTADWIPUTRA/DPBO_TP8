<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Detail Mahasiswa</h5>
        <a href="index.php?controller=student&action=index" class="btn btn-secondary btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th width="30%">NIM</th>
                        <td width="5%">:</td>
                        <td><?= $student['nim'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>:</td>
                        <td><?= $student['name'] ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>:</td>
                        <td><?= $student['phone'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Bergabung</th>
                        <td>:</td>
                        <td><?= date('d-m-Y', strtotime($student['join_date'])) ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="mt-4">
            <h5>Daftar Mata Kuliah yang Dikontrak</h5>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        if ($kontrakList->num_rows > 0) {
                            while ($row = $kontrakList->fetch_assoc()) { 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['kode_matkul'] ?></td>
                            <td><?= $row['nama_matkul'] ?></td>
                            <td><?= $row['semester'] ?></td>
                            <td><?= $row['tahun_ajaran'] ?></td>
                            <td><?= $row['nilai'] ? $row['nilai'] : '-' ?></td>
                        </tr>
                        <?php 
                            }
                        } else { 
                        ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada mata kuliah yang dikontrak</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
