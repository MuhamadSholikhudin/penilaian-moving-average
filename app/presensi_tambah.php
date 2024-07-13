<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

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
                Tambah Data Presensi
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/presensi.php" method="post" enctype="multipart/form-data">          
                <div class="mb-3 row">
                    <label for="nis" class="col-sm-2 col-form-label">Siswa</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="nis" id="nis">
                            <?php
                            foreach(QueryManyData("SELECT * FROM siswa ") as $row) {
                            ?>
                                <option value="<?= $row["nis"] ?>"> <?= $row["nis"] ?> | <?= $row["nama_siswa"] ?></option>
                            <?php
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nilai_presensi" class="col-sm-2 col-form-label">Nilai Presensi</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nilai_presensi" name="nilai_presensi" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="semester" name="semester" required>
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
                                <option value="<?= $row ?>"><?= $row ?></option>
                            <?php
                            }
                            ?>
                        </select>  
                    </div>
                </div>

                <div class="mb-3 row">
                    <button type="submit" name="simpanpresensi" value="simpanpresensi" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>