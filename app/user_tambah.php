<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/user.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Tambah Data User
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/user.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="inputusername" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputusername" name="username" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="password" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputnm_pengguna" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputnm_pengguna" name="nm_pengguna" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputhakses" class="col-sm-2 col-form-label">Hak Akses </label>
                    <div class="col-sm-10">
                        <?php 
                            $level = [
                                "wakasiswa",  "guru mapel"
                            ];
                        ?>
                        <select class="form-control" name="level" id="inputhakses">
                            <?php
                            foreach($level as  $val) {
                            ?>
                                <option value="<?= $val ?>"><?= $val ?></option>
                            <?php
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="simpanuser" value="simpanuser" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>