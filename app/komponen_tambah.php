<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Komponen Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/komponen.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Tambah Data Komponen
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/komponen.php" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>" required>
            
                <div class="mb-3 row">
                    <label for="inputhakses" class="col-sm-2 col-form-label">Alat Berat</label>
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
                    <label for="nama_komponen" class="col-sm-2 col-form-label">Nama Komponen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_komponen" name="nama_komponen" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tipe_komponen" class="col-sm-2 col-form-label">Tipe Komponen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tipe_komponen" name="tipe_komponen" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tahun_pembuatan" class="col-sm-2 col-form-label">Tahun Pembuatan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" maxlength="4" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea type="number" class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="simpankomponen" value="simpankomponen" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>