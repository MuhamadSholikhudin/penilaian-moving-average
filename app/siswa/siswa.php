<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Siswa Page</h1>
    <?php
    if (isset($_SESSION['message'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['message']);
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/siswa/siswa_tambah.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-plus"></i>
                </a>
                Data Siswa
            </h6>
        </div>
        <div class="card-body table-responsive">
            <table id="example" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>TANGGAL LAHIR</th>
                        <th>JENIS KELAMIN</th>
                        <th>NO HP</th>
                        <th>NAMA WALI</th>
                        <th>STATUS SISWA</th>
                        <th>ALAMAT SISWA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM siswa") as $row) {
                    ?>
                        <tr>
                            <td><?= $row["nis"] ?></td>
                            <td><?= $row["nm_siswa"] ?></td>
                            <td>
                                <?php
                                    $kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $row['id_kelas'] . " ")->fetch_assoc();
                                ?>
                                <?= $kelas["kelas"]." ".$kelas["nm_kelas"] ?></td>
                            <td><?= $row["tgl_lahir_siswa"] ?></td>
                            <td><?= $row["jk_siswa"] ?></td>
                            <td><?= $row["no_hp"] ?></td>
                            <td><?= $row["nm_wali"] ?></td>
                            <td><?= $row["status_siswa"] ?></td>
                            <td><?= $row["alamat_siswa"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/siswa/siswa_edit.php?id_siswa=<?= $row["id_siswa"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="ConfirmDelete(<?= $row['id_siswa'] ?>)" class="btn btn-danger btn-sm btn-circle">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function ConfirmDelete(id) {
            let text = "Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.";
            if (confirm(text) == true) {
                text = "You pressed OK!";
                window.location.href = "<?= $url ?>/aksi/siswa.php?id_siswa=" + id + "&action=delete";
            }
        }
    </script>
</div>
<!-- /.container-fluid -->
<?php include_once '../template/footer.php'; ?>