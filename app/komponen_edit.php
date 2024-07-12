<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<?php 
$komponen = QueryOnedata("SELECT * FROM komponen WHERE id_komponen = ".$_GET['id_komponen']." ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perawatan Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/komponen.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Perawatan
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/komponen.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="inputusername" name="id_komponen" value="<?= $komponen['id_komponen'] ?>" required>
            
                <div class="mb-3 row">
                    <label for="id_alat_berat" class="col-sm-2 col-form-label">Alat Berat</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_alat_berat" id="id_alat_berat">
                            <?php
                            foreach(QueryManyData("SELECT * FROM alat_berat ") as $row) {
                                if($row["id_alat_berat"] == $komponen['id_alat_berat']){
                                    ?>
                                    <option value="<?= $row["id_alat_berat"] ?>" selected><?= $row["nama_alat_berat"] ?></option>
                                <?php
                                }else{
                                    ?>
                                    <option value="<?= $row["id_alat_berat"] ?>"><?= $row["nama_alat_berat"] ?></option>
                                <?php
                                }                           
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_komponen" class="col-sm-2 col-form-label">Nama Komponen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_komponen" name="nama_komponen" value="<?= $komponen['nama_komponen'] ?>"  required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tipe_komponen" class="col-sm-2 col-form-label">Tipe Komponen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tipe_komponen" name="tipe_komponen" value="<?= $komponen['tipe_komponen'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tahun_pembuatan" class="col-sm-2 col-form-label">Tahun Pembuatan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" value="<?= $komponen['tahun_pembuatan'] ?>" maxlength="4" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea type="number" class="form-control" id="deskripsi" name="deskripsi" required><?= $komponen['deskripsi'] ?></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <button type="submit" name="updatekomponen" value="updatekomponen" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>