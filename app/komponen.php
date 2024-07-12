<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Komponen Page</h1>
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
                <a href="<?= $url ?>/app/komponen_tambah.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-plus"></i>
                </a>
                Data Komponen
            </h6>

        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>NAMA ALAT BERAT</th>
                        <th>NAMA KOMPONEN</th>
                        <th>TIPE KOMPONEN</th>
                        <th>TAHUN PEMBUATAN</th>
                        <th>DESKRIPSI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM komponen LEFT JOIN alat_berat ON komponen.id_alat_berat = alat_berat.id_alat_berat") as $row) {
                    ?>
                        <tr>
                            <td><?= $row["nama_alat_berat"] ?></td>
                            <td><?= $row["nama_komponen"] ?></td>
                            <td><?= $row["tipe_komponen"] ?></td>
                            <td><?= $row["tahun_pembuatan"] ?></td>     
                            <td><?= $row["deskripsi"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/komponen_edit.php?id_komponen=<?= $row["id_komponen"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="ConfirmDelete(<?= $row['id_komponen'] ?>)" class="btn btn-danger btn-sm btn-circle">
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
                window.location.href = "<?= $url ?>/app/aksi/komponen.php?id_komponen="+id+"&action=delete";
            } 
        }
    </script>





</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>