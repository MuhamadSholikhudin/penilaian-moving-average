<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Siswa Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/siswa.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Tambah Data Siswa
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/siswa.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="nis" class="col-sm-2 col-form-label">Nomor Induk Siswa</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nis" name="nis" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nm_siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nm_siswa" name="nm_siswa" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_lahir_siswa" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_lahir_siswa" name="tgl_lahir_siswa" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jk_siswa" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="jk_siswa" id="jk_siswa">
                        <?php $kelamin = ['L' => 'Laki-Laki', 'P' => 'Perempuan']; ?>
                            <?php foreach($kelamin as $key => $val){ ?>
                                <option value="<?= $key ?>"><?= $val ?></option>
                            <?php } ?>
                        </select>
                        
                    </div>                
                </div>
                <div class="mb-3 row">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="id_kelas" id="kelas">
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
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nm_wali" class="col-sm-2 col-form-label">Nama Wali</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nm_wali" name="nm_wali" required>
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
                            foreach($status as $val) {                                
                            ?>
                                <option value="<?= $val ?>"><?= $val ?></option>
                            <?php
                                                          
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat_siswa" class="col-sm-2 col-form-label">Alamat Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <button type="submit" name="simpansiswa" value="simpansiswa" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>