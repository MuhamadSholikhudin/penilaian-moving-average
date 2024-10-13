<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

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
                Tambah Data Kehadiran Siswa
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/kehadiran_siswa.php" method="post" enctype="multipart/form-data">     
            <div class="mb-3 row">
                    <label for="id_siswa" class="col-sm-2 col-form-label">Siswa</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_siswa" id="id_siswa">
                            <?php
                            foreach(QueryManyData("SELECT * FROM siswa ") as $row) {
                            ?>
                                <option value="<?= $row["id_siswa"] ?>"> <?= $row["nm_siswa"] ?> </option>
                            <?php
                            }
                            ?>
                        </select>                        
                    </div>
                </div> 
                <div class="mb-3 row">
                    <label for="tgl_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" required>
                    </div>
                </div>    
                <div class="mb-3 row">
                    <label for="jam_masuk" class="col-sm-2 col-form-label">Jam Masuk</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" required>                                            
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="jam_pulang" class="col-sm-2 col-form-label">Jam Pulang</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="jam_pulang" name="jam_pulang" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="status" id="status">
                            <?php
                            $status = ['Masuk', 'Tidak Masuk', 'Izin'];
                            foreach($status as $row) {
                            ?>
                                <option value="<?= $row ?>"> <?= $row ?> </option>
                            <?php
                            }
                            ?>
                        </select> 
                    </div>
                </div>              
                <div class="mb-3 row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    </div>
                </div>              
                <div class="mb-3 row">
                    <button type="submit" name="simpankehadiran_siswa" value="simpankehadiran_siswa" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>