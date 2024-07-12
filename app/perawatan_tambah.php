<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perawatan Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/perawatan.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Tambah Data Perawatan
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/perawatan.php" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>" required>
            
                <div class="mb-3 row">
                    <label for="id_alat_berat" class="col-sm-2 col-form-label">Alat Berat</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_alat_berat" id="id_alat_berat">
                            <?php
                            foreach(QueryManyData("SELECT * FROM alat_berat ") as $row) {
                            ?>
                                <option value="<?= $row["id_alat_berat"] ?>"><?= $row["nama_alat_berat"] ?></option>
                            <?php
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggal_perawatan" class="col-sm-2 col-form-label">Tanggal Perawatan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_perawatan" name="tanggal_perawatan" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jenis_perawatan" class="col-sm-2 col-form-label">Jenis Perawatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jenis_perawatan" name="jenis_perawatan" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="biaya_perawatan" class="col-sm-2 col-form-label">Biaya Perawatan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="biaya_perawatan" name="biaya_perawatan" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea type="number" class="form-control" id="keterangan" name="keterangan" required></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="simpanperawatan" value="simpanperawatan" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>