<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php
$kehadiran_siswa = QueryOnedata('SELECT * FROM kehadiran_siswa WHERE id_kehadiran = "' . $_GET['id_kehadiran'] . '" ')->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kehadiran Siswa Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/kehadiran_siswa/kehadiran_siswa.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Kehadiran Siswa
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/kehadiran_siswa.php" method="post" enctype="multipart/form-data">
            <input type="number" class="form-control d-none" id="id_kehadiran" name="id_kehadiran" value="<?= $_GET['id_kehadiran'] ?>" required>
                <div class="mb-3 row">
                    <label for="id_siswa" class="col-sm-2 col-form-label">Siswa</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_siswa" id="id_siswa">
                            <?php
                            foreach (QueryManyData("SELECT * FROM siswa ") as $row) {
                                if ($kehadiran_siswa['id_siswa'] == $row['id_siswa']) {
                            ?>
                                    <option value="<?= $row["id_siswa"] ?>" selected> <?= $row["nm_siswa"] ?> </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row["id_siswa"] ?>"> <?= $row["nm_siswa"] ?> </option>
                                <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jam_pulang" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?= $kehadiran_siswa['tgl_masuk'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jam_masuk" class="col-sm-2 col-form-label">Jam Masuk</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" value="<?= $kehadiran_siswa['jam_masuk'] ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="jam_pulang" class="col-sm-2 col-form-label">Jam Pulang</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="jam_pulang" name="jam_pulang" value="<?= $kehadiran_siswa['jam_pulang'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="status" id="status">
                            <?php
                            $status = ['Masuk', 'Tidak Masuk', 'Izin'];
                            foreach ($status as $row) {
                            if ($kehadiran_siswa['status'] == $row) {
                            ?>
                                    <option value="<?= $row ?>" selected> <?= $row ?> </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row ?>"> <?= $row ?> </option>
                                <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $kehadiran_siswa['keterangan'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="updatekehadiran_siswa" value="updatekehadiran_siswa" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>