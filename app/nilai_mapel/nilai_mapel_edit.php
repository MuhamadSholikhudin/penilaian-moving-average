<?php
include_once '../template/header.php';
include_once '../template/sidebar.php';
include_once '../template/navbar.php';

$nilai_mapel = QueryOnedata("SELECT * FROM nilai_mapel WHERE id_nilai_mapel = " . $_GET['id_nilai_mapel'] . "")->fetch_assoc();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Nilai Mapel Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/nilai_mapel/nilai_mapel.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Nilai Mapel
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/nilai_mapel.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_nilai_mapel" value="<?= $_GET['id_nilai_mapel'] ?>">
                <div class="mb-3 row">
                    <label for="siswa" class="col-sm-2 col-form-label">Siswa</label>
                    <div class="col-sm-10">
                        <select class="form-control js-example-basic-single" name="id_siswa" id="status">
                            <?php
                            foreach (QueryManyData("SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas ") as $row) {
                                if ($nilai_mapel['id_siswa'] == $row['id_siswa']) {
                            ?>
                                    <option value="<?= $row['id_siswa'] ?>" selected><?= $row['kelas'] ?> <?= $row['nm_kelas'] ?> <?= $row['nm_siswa'] ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row['id_siswa'] ?>"><?= $row['kelas'] ?> <?= $row['nm_kelas'] ?> <?= $row['nm_siswa'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label ">Jadwal Siswa</label>
                    <div class="col-sm-10">
                        <select class="form-control js-example-basic-single" name="id_jadwal" id="status">
                            <?php
                            foreach (QueryManyData("SELECT * FROM jadwal_siswa LEFT JOIN mapel ON jadwal_siswa.id_mapel = mapel.id_mapel LEFT JOIN periode ON periode.id_periode = mapel.id_periode ORDER BY mapel.id_periode DESC ") as $row) {
                                $kel = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $row['id_kelas'] . "")->fetch_assoc();
                                if ($nilai_mapel['id_jadwal_siswa'] == $row['id_jadwal_siswa']) {
                            ?>
                                    <option value="<?= $row['id_jadwal_siswa'] ?>" selected><?= $row['nm_mapel'] ?> Kelas <?= $kel['kelas'] ?> <?= $row['nm_periode'] ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row['id_jadwal_siswa'] ?>"><?= $row['nm_mapel'] ?> Kelas <?= $kel['kelas'] ?> <?= $row['nm_periode'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Nilai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nilai" name="nilai" value="<?= $nilai_mapel['nilai'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Keterangan Nilai</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="ket_nilai" id="status">
                            <?php
                            $ket_nilai = ['UH1', 'UH2', 'UH3', 'UH4', 'UTS', 'UAS'];
                            foreach ($ket_nilai as $row) {
                                if ($nilai_mapel['ket_nilai'] == $row) {
                            ?>
                                    <option value="<?= $row ?>" selected><?= $row ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row ?>"><?= $row ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="simpannilai_mapel" value="simpannilai_mapel" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include_once '../template/footer.php'; ?>