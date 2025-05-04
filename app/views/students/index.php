<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Daftar Mahasiswa</h5>
        <a href="index.php?controller=student&action=create" class="btn btn-primary btn-sm">
            <i class="bi bi-plus"></i> Tambah Mahasiswa
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>Tanggal Bergabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    if ($students->num_rows > 0) {
                        while ($row = $students->fetch_assoc()) { 
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nim'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= date('d-m-Y', strtotime($row['join_date'])) ?></td>
                        <td>
                            <a href="index.php?controller=student&action=show&id=<?= $row['id'] ?>" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="index.php?controller=student&action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="index.php?controller=student&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else { 
                    ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data mahasiswa</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
