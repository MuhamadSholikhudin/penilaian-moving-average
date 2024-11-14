<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<?php
$ekstra_siswa = QueryOnedata("SELECT * FROM ekstra_siswa WHERE id_ekstra_siswa = " . $_GET['id_ekstra_siswa'] . " ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ekstra Siswa Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/ekstra_siswa/ekstra_siswa.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Ekstra Siswa
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/ekstra_siswa.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="inputusername" name="id_ekstra_siswa" value="<?= $ekstra_siswa['id_ekstra_siswa'] ?>" required>
                <div class="mb-3 row">
                    <label for="id_siswa" class="col-sm-2 col-form-label">Siswa</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_siswa" id="id_siswa">
                            <?php
                            foreach (QueryManyData("SELECT * FROM siswa ") as $row) {
                                $kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = ".$row['id_kelas']."")->fetch_assoc();
                                if ($row["id_siswa"] == $ekstra_siswa['id_siswa']) {
                            ?>
                                    <option value="<?= $row["id_siswa"] ?>" selected> <?= $row["nis"] ?> | <?= $row["nm_siswa"] ?> | <?= $kelas['kelas'] ?> <?= $kelas['nm_kelas'] ?></option>

                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row["id_siswa"] ?>" > <?= $row["nis"] ?> | <?= $row["nm_siswa"] ?> | <?= $kelas['kelas'] ?> <?= $kelas['nm_kelas'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="id_mapel" class="col-sm-2 col-form-label">Nama Ekstra</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_ekstra" id="id_ekstra">
                            <?php
                            foreach (QueryManyData("SELECT * FROM ekstra ") as $row) {
                                if ($row["id_ekstra"] == $ekstra_siswa['id_ekstra']) {
                            ?>
                                    <option value="<?= $row["id_ekstra"] ?>" selected> <?= $row["nm_ekstra"] ?> </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $row["id_ekstra"] ?>"> <?= $row["nm_ekstra"] ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>               
                <div class="mb-3 row">
                    <button type="submit" name="updateekstra_siswa" value="updateekstra_siswa" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>