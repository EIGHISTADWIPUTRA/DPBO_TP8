<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Daftar Kontrak Mata Kuliah</h5>
        <a href="index.php?controller=mengontrak&action=create" class="btn btn-primary btn-sm">
            <i class="bi bi-plus"></i> Tambah Kontrak Mata Kuliah
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    if ($mengontraks->num_rows > 0) {
                        while ($row = $mengontraks->fetch_assoc()) { 
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nim'] ?></td>
                        <td><?= $row['student_name'] ?></td>
                        <td><?= $row['kode_matkul'] ?></td>
                        <td><?= $row['nama_matkul'] ?></td>
                        <td><?= $row['semester'] ?></td>
                        <td><?= $row['tahun_ajaran'] ?></td>
                        <td><?= $row['nilai'] ? $row['nilai'] : '-' ?></td>
                        <td>
                            <a href="index.php?controller=mengontrak&action=show&id=<?= $row['id'] ?>" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="index.php?controller=mengontrak&action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="index.php?controller=mengontrak&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else { 
                    ?>
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data kontrak mata kuliah</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
