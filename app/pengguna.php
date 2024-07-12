<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pengguna Page</h1>
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
                <a href="<?= $url ?>/app/pengguna_tambah.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-plus"></i>
                </a>
                Data Pengguna
            </h6>

        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>USERNAME</th>
                        <th>HAK AKSES</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM pengguna") as $row) {
                    ?>
                        <tr>
                            <td><?= $row["id_pengguna"] ?></td>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["username"] ?></td>
                            <td>
                                <?php if ($row["hakakses"] == 1) {
                                    echo "Super Admin";
                                } elseif ($row["hakakses"] == 2) {
                                    echo "Admin";
                                } elseif ($row["hakakses"] == 3) {
                                    echo "Operator";
                                } elseif ($row["hakakses"] == 4) {
                                    echo "Teknisi";
                                }
                                ?>
                            </td>
                            <td><?= $row["status"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/pengguna_edit.php?id_pengguna=<?= $row["id_pengguna"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="ConfirmDelete(<?= $row['id_pengguna'] ?>)" class="btn btn-danger btn-sm btn-circle">
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
                window.location.href = "<?= $url ?>/app/aksi/pengguna.php?id_pengguna="+id+"&action=delete";
            } 
        }
    </script>
</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>