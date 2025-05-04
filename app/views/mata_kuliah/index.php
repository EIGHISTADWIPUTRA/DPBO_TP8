<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Daftar Mata Kuliah</h5>
        <a href="index.php?controller=mataKuliah&action=create" class="btn btn-primary btn-sm">
            <i class="bi bi-plus"></i> Tambah Mata Kuliah
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    if ($mataKuliahs->num_rows > 0) {
                        while ($row = $mataKuliahs->fetch_assoc()) { 
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['kode_matkul'] ?></td>
                        <td><?= $row['nama_matkul'] ?></td>
                        <td><?= $row['sks'] ?></td>
                        <td>
                            <a href="index.php?controller=mataKuliah&action=show&id=<?= $row['id'] ?>" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="index.php?controller=mataKuliah&action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="index.php?controller=mataKuliah&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else { 
                    ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data mata kuliah</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
