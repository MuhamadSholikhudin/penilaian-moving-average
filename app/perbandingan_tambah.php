<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Sub Kriteria Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/perbandingan.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Tambah Data Sub Kriteria
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/perbandingan.php" method="post" enctype="multipart/form-data">           
                <div class="mb-3 row">
                    <label for="sub_kriteria1" class="col-sm-2 col-form-label">Alat Berat</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="sub_kriteria1" id="sub_kriteria1">
                            <?php
                            foreach(QueryManyData("SELECT * FROM sub_kriteria ") as $row) {
                            ?>
                                <option value="<?= $row["id_sub_kriteria"] ?>"><?= $row["sub_kriteria"] ?></option>
                            <?php
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sub_kriteria2" class="col-sm-2 col-form-label">Alat Berat</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="sub_kriteria2" id="sub_kriteria2">
                            <?php
                            foreach(QueryManyData("SELECT * FROM sub_kriteria ") as $row) {
                            ?>
                                <option value="<?= $row["id_sub_kriteria"] ?>"><?= $row["sub_kriteria"] ?></option>
                            <?php
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nilai" name="nilai" value="1" min="1" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="simpanperbandingan" value="simpanperbandingan" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>