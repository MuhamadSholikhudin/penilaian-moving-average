<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwal Ekstra Page</h1>
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
                <a href="<?= $url ?>/app/ekstra_siswa/ekstra_siswa_tambah.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-plus"></i>
                </a>
                Data Jadwal Ekstra
            </h6>
        </div>
        <div class="card-body table-responsive">
            <table id="example" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Ekstra</th>
                        <th>Penanggung Jawab</th>
                        <th>Jumlah Siswa</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM ekstra_siswa GROUP BY id_ekstra") as $row) {
                        $siswa = QueryOnedata("SELECT COUNT(*) as count FROM ekstra_siswa WHERE id_ekstra = " . $row['id_ekstra'] . " ")->fetch_assoc();
                        $ekstra = QueryOnedata("SELECT * FROM ekstra WHERE id_ekstra = " . $row['id_ekstra'] . " ")->fetch_assoc();
                    ?>
                        <tr>
                            <td><?= $ekstra["nm_ekstra"] ?></td>
                            <td><?= $ekstra["penanggung_jawab"] ?></td>
                            <td><?= $siswa["count"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/ekstra_siswa/ekstra_siswa_id.php?id_ekstra=<?= $row["id_ekstra"] ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> detail
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php /*
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/ekstra_siswa/ekstra_siswa_tambah.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-plus"></i>
                </a>
                Data Jadwal Ekstra
            </h6>

        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Nama Ekstra</th>
                        <th>Penanggung Jawab</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM ekstra_siswa ") as $row) {
                        $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $row['id_siswa'] . " ")->fetch_assoc();
                        $ekstra = QueryOnedata("SELECT * FROM ekstra WHERE id_ekstra = " . $row['id_ekstra'] . " ")->fetch_assoc();
                    ?>
                        <tr>
                            <td><?= $siswa["nm_siswa"] ?></td>
                            <td><?= $ekstra["nm_ekstra"] ?></td>
                            <td><?= $ekstra["penanggung_jawab"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/ekstra_siswa/ekstra_siswa_edit.php?id_ekstra_siswa=<?= $row["id_ekstra_siswa"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="ConfirmDelete(<?= $row['id_ekstra_siswa'] ?>)" class="btn btn-danger btn-sm btn-circle">
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
    */ ?>
    <script>
        function ConfirmDelete(id) {
            let text = "Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.";
            if (confirm(text) == true) {
                text = "You pressed OK!";
                window.location.href = "<?= $url ?>/aksi/ekstra_siswa.php?id_ekstra_siswa=" + id + "&action=delete";
            }
        }
    </script>
</div>
<!-- /.container-fluid -->
<?php include_once '../template/footer.php'; ?>