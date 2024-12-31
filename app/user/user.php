<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User Page</h1>
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
                <a href="<?= $url ?>/app/user/user_tambah.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-plus"></i>
                </a>
                Data User
            </h6>
        </div>
        <div class="card-body table-responsive">
            <table id="example" class="display table" style="width:100%">
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
                    foreach (QueryManyData("SELECT * FROM user") as $row) {
                    ?>
                        <tr>
                            <td><?= $row["id_user"] ?></td>
                            <td><?= $row["nm_pengguna"] ?></td>
                            <td><?= $row["username"] ?></td>
                            <td>
                                <?= $row["level"] ?>
                            </td>
                            <td><?= $row["status"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/user/user_edit.php?id_user=<?= $row["id_user"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="ConfirmDelete(<?= $row['id_user'] ?>)" class="btn btn-danger btn-sm btn-circle">
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
                window.location.href = "<?= $url ?>/aksi/user.php?id_user=" + id + "&action=delete";
            }
        }
    </script>
</div>
<!-- /.container-fluid -->
<?php include_once '../template/footer.php'; ?>