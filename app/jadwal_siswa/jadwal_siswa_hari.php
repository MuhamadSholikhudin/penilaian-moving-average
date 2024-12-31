<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwal Siswa Page</h1>
    <?php
    if (isset($_SESSION['message'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success !</strong> <?= $_SESSION['message'] ?>
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
                <a href="<?= $url ?>/app/jadwal_siswa/jadwal_siswa.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fa fa-arrow-left"></i>
                </a>
                Data Jadwal Siswa Hari
            </h6>
        </div>
        <div class="card-body table-responsive">
            <table id="example" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Jumlah Data</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT  * FROM jadwal_siswa GROUP BY hari") as $row) {
                    ?>
                        <tr>
                            <td><?= $row["hari"] ?></td>
                            <td></td>
                            <td>
                                <a href="<?= $url ?>/app/jadwal_siswa/jadwal_siswa_idhari.php?hari=<?= $row["hari"] ?>" class="btn btn-primary btn-sm ">
                                    <i class="fas fa-eye"></i> Lihat
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
    <script>
        function ConfirmDelete(id) {
            let text = "Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.";
            if (confirm(text) == true) {
                text = "You pressed OK!";
                window.location.href = "<?= $url ?>/aksi/jadwal_siswa.php?id_jadwal_siswa=" + id + "&action=delete";
            }
        }
    </script>





</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>