<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perawatan Page</h1>
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
                <a href="<?= $url ?>/app/perawatan_tambah.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-plus"></i>
                </a>
                Data Perawatan
            </h6>

        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>NAMA</th>
                        <th>teknisi</th>
                        <th>JENIS PERAWATAN</th>
                        <th>TANGGAL PERAWATAN</th>
                        <th>KETERANGAN</th>
                        <th>BIAYA PERAWATAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM perawatan 
                    LEFT JOIN alat_berat ON perawatan.id_alat_berat = alat_berat.id_alat_berat 
                    INNER JOIN pengguna ON perawatan.id_pengguna = pengguna.id_pengguna ") as $row) {
                    ?>
                        <tr>
                            <td><?= $row["nama_alat_berat"] ?></td>
                            <td><?= $row["username"] ?></td>
                            <td><?= $row["jenis_perawatan"] ?></td>
                            <td><?= $row["tanggal_perawatan"] ?></td>     
                            <td><?= $row["keterangan"] ?></td>
                            <td><?= $row["biaya_perawatan"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/perawatan_edit.php?id_perawatan=<?= $row["id_perawatan"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="ConfirmDelete(<?= $row['id_perawatan'] ?>)" class="btn btn-danger btn-sm btn-circle">
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
                window.location.href = "<?= $url ?>/app/aksi/perawatan.php?id_perawatan="+id+"&action=delete";
            } 
        }
    </script>





</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>