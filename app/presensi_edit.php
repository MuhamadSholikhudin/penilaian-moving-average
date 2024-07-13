<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<?php 
$presensi = QueryOnedata("SELECT * FROM presensi WHERE id_presensi = ".$_GET['id_presensi']." ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Presensi Page</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/presensi.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Presensi
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/presensi.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="inputusername" name="id_presensi" value="<?= $presensi['id_presensi'] ?>" required>
                <div class="mb-3 row">
                    <label for="nis" class="col-sm-2 col-form-label">Siswa</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="nis" id="nis">
                            <?php
                            foreach(QueryManyData("SELECT * FROM siswa ") as $row) {
                            ?>
                                 <?php if($row["nis"] == $presensi['nis']) { ?>
                                    <option value="<?= $row["nis"] ?>" selected><?= $row["nis"] ?> | <?= $row["nama_siswa"] ?></option>
                                <?php } else { ?>
                                    <option value="<?= $row["nis"] ?>"><?= $row["nis"] ?> | <?= $row["nama_siswa"] ?></option>
                                <?php } ?>
                            <?php
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nilai_presensi" class="col-sm-2 col-form-label">Nilai Presensi</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nilai_presensi" name="nilai_presensi" value="<?= $presensi['nilai_presensi'] ?>"  required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="semester" name="semester" value="<?= $presensi['semester'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ket_presensi" class="col-sm-2 col-form-label">Keterangan Presensi</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="ket_presensi" id="ket_presensi">
                            <?php
                            $ket_nilai = ['Sangat Baik', 'Baik', 'Cukup', 'Kurang', 'Sangat Kurang'];
                            foreach($ket_nilai as $row) {
                            ?>
                            <?php if($row == $presensi['ket_presensi']) { ?>
                                    <option value="<?= $row ?>" selected><?= $row ?></option>
                                <?php } else { ?>
                                    <option value="<?= $row ?>"><?= $row ?></option>
                                <?php } ?>
                            <?php
                            }
                            ?>
                        </select>  
                    </div>
                </div>

                <div class="mb-3 row">
                    <button type="submit" name="updatepresensi" value="updatepresensi" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>