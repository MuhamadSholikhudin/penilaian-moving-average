<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<?php
$siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $_GET['id_siswa'] . " ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Siswa Page</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/siswa/siswa.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Siswa
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/siswa.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id_siswa" name="id_siswa" value="<?= $siswa['id_siswa'] ?>" required>

                <div class="mb-3 row">
                    <label for="nis" class="col-sm-2 col-form-label">Nomor Induk Siswa</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nis" name="nis" value="<?= $siswa['nis'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nm_siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nm_siswa" name="nm_siswa" value="<?= $siswa['nm_siswa'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_lahir_siswa" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_lahir_siswa" name="tgl_lahir_siswa" value="<?= $siswa['tgl_lahir_siswa'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jk_siswa" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jk_siswa" id="jk_siswa">
                            <?php $kelamin = ['L' => 'Laki-Laki', 'P' => 'Perempuan']; ?>
                            <?php foreach ($kelamin as $key => $val) {
                                if ($val == $siswa['jk_siswa']) {
                            ?>
                                    <option value="<?= $key ?>" selected><?= $val ?></option>
                                <?php } else {
                                ?>
                                    <option value="<?= $key ?>"><?= $val ?></option>
                            <?php }
                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_kelas" id="kelas">
                            <?php
                            foreach (QueryManyData("SELECT * FROM kelas") as $row) {
                            ?>
                                <option value="<?= $row['id_kelas'] ?>"><?= $row['kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_hp" class="col-sm-2 col-form-label">Nomer HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $siswa['no_hp'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nm_wali" class="col-sm-2 col-form-label">Nama Wali</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nm_wali" name="nm_wali" value="<?= $siswa['nm_wali'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <?php
                        $status = [
                            "Aktif",
                            "Tidak Aktif",
                        ];
                        ?>
                        <select class="form-control" name="status_siswa" id="status">
                            <?php
                            foreach ($status as $val) {
                                if ($val == $siswa['status_siswa']) {
                            ?>
                                    <option value="<?= $val ?>" selected><?= $val ?></option>
                                <?php
                                } else {
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
                    <label for="alamat_siswa" class="col-sm-2 col-form-label">Alamat Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" value="<?= $siswa['alamat_siswa'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="updatesiswa" value="updatesiswa" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>