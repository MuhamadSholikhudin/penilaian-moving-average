<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<?php
$jadwal_siswa = QueryOnedata("SELECT * FROM jadwal_siswa WHERE id_jadwal_siswa = " . $_GET['id_jadwal_siswa'] . " ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwa Siswa Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/jadwal_siswa/jadwal_siswa.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Jadwa Siswa
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/jadwal_siswa.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="inputusername" name="id_jadwal_siswa" value="<?= $jadwal_siswa['id_jadwal_siswa'] ?>" required>
                <div class="mb-3 row">
                    <label for="id_siswa" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_kelas" id="id_kelas">
                            <?php
                            foreach (QueryManyData("SELECT * FROM kelas ") as $row) {
                                if ($row["id_kelas"] == $jadwal_kelas['id_kelas']) {
                            ?>
                                    <option value="<?= $row["id_kelas"] ?>" selected> <?= $row["kelas"] ?> <?= $row["nm_kelas"] ?> </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row["id_kelas"] ?>"> <?= $row["kelas"] ?> <?= $row["nm_kelas"] ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="id_siswa" class="col-sm-2 col-form-label">Siswa</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_siswa" id="id_siswa">
                            <?php
                            foreach (QueryManyData("SELECT * FROM siswa ") as $row) {
                                if ($row["id_siswa"] == $jadwal_siswa['id_siswa']) {
                            ?>
                                    <option value="<?= $row["id_siswa"] ?>" selected> <?= $row["nm_siswa"] ?> </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row["id_siswa"] ?>"> <?= $row["nm_siswa"] ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="id_mapel" class="col-sm-2 col-form-label">Mapel</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_mapel" id="id_mapel">
                            <?php
                            foreach (QueryManyData("SELECT * FROM mapel ") as $row) {
                                if ($row["id_mapel"] == $jadwal_siswa['id_mapel']) {
                            ?>
                                    <option value="<?= $row["id_mapel"] ?>" selected> <?= $row["nm_mapel"] ?> </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row["id_mapel"] ?>"> <?= $row["nm_mapel"] ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="id_guru" class="col-sm-2 col-form-label">Guru</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_guru" id="id_guru">
                            <?php
                            foreach (QueryManyData("SELECT * FROM guru ") as $row) {
                                if ($row["id_guru"] == $jadwal_siswa['id_guru']) {
                            ?>
                                    <option value="<?= $row["id_guru"] ?>" selected> <?= $row["nm_guru"] ?> </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row["id_guru"] ?>"> <?= $row["nm_guru"] ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="hari" class="col-sm-2 col-form-label">Guru</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="hari" id="hari">
                            <?php
                            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                            foreach ($hari as $row) {
                                if($row == $jadwal_siswa['hari']){
                                    ?>
                                    <option value="<?= $row ?>" selected> <?= $row ?> </option>
                                <?php
                                }else{
                                    ?>
                                    <option value="<?= $row ?>"> <?= $row ?> </option>
                                <?php
                                }                           
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="waktu_awal" class="col-sm-2 col-form-label">Waktu Awal</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="waktu_awal" name="waktu_awal" value="<?= $jadwal_siswa['waktu_awal'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="waktu_akhir" class="col-sm-2 col-form-label">Waktu Akhir</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="waktu_akhir" name="waktu_akhir" value="<?= $jadwal_siswa['waktu_akhir'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="updatejadwal_siswa" value="updatejadwal_siswa" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>