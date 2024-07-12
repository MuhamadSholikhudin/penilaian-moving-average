<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<?php 
$pengguna = QueryOnedata("SELECT * FROM pengguna WHERE id_pengguna = ".$_GET['id_pengguna']." ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pengguna Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/pengguna.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Pengguna
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/pengguna.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="inputusername" name="id_pengguna" value="<?= $pengguna['id_pengguna'] ?>" required>
                <div class="mb-3 row">
                    <label for="inputusername" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputusername" name="username" value="<?= $pengguna['username'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="password" value="<?= $pengguna['password'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputname" name="name" value="<?= $pengguna['name'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputhakses" class="col-sm-2 col-form-label">Hak Akses</label>
                    <div class="col-sm-10">
                        <?php 
                            $hakakses = [
                                1 => "Super Admin",
                                2 => "Admin",
                                3 => "Operator",
                                4 => "Teknisi",
                            ];
                        ?>
                        <select class="form-control" name="hakakses" id="inputhakses">
                            <?php
                            foreach($hakakses as $key => $val) {
                                if($key == $user['hakakses']){
                                    ?>
                                    <option value="<?= $key ?>" selected><?= $val ?></option>
                                <?php
                                }else{
                                    ?>
                                    <option value="<?= $key ?>"><?= $val ?></option>
                                <?php
                                }                            
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputhakses" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <?php 
                            $status = [
                                "active",
                                "non-active",
                            ];
                        ?>
                        <select class="form-control" name="status" id="inputhakses">
                            <?php
                            foreach($status as $val) {
                                if($val == $pengguna['status']){
                                    ?>
                                    <option value="<?= $val ?>" selected><?= $val ?></option>
                                <?php
                                }else{
                                    ?>
                                    <option value="<?= $val ?>"><?= $val ?></option>
                                <?php
                                }                            
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <button type="submit" name="updateuser" value="updateuser" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>