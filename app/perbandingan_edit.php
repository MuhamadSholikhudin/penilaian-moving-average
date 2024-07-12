<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<?php 
$perbandingan = QueryOnedata("SELECT * FROM perbandingan WHERE id_perbandingan = ".$_GET['id_perbandingan']." ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kriteria Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/perbandingan.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Kriteria
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/perbandingan.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id_perbandingan" name="id_perbandingan" value="<?= $perbandingan['id_perbandingan'] ?>" required>
                <form action="<?= $url ?>/app/aksi/perbandingan.php" method="post" enctype="multipart/form-data">           
                <div class="mb-3 row">
                    <label for="sub_kriteria1" class="col-sm-2 col-form-label">Alat Berat</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="sub_kriteria1" id="sub_kriteria1">
                            <?php
                            foreach(QueryManyData("SELECT * FROM sub_kriteria ") as $row) {
                                if($row["id_sub_kriteria"]  == $perbandingan['sub_kriteria1']){
                                    ?>
                                    <option value="<?= $row["id_sub_kriteria"] ?>" selected><?= $row["sub_kriteria"] ?></option>
                                <?php
                                }else{
                                    ?>
                                    <option value="<?= $row["id_sub_kriteria"] ?>"><?= $row["sub_kriteria"] ?></option>
                                <?php
                                }
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
                                if($row["id_sub_kriteria"]  == $perbandingan['sub_kriteria2']){
                                    ?>
                                    <option value="<?= $row["id_sub_kriteria"] ?>" selected><?= $row["sub_kriteria"] ?></option>
                                <?php
                                }else{
                                    ?>
                                    <option value="<?= $row["id_sub_kriteria"] ?>"><?= $row["sub_kriteria"] ?></option>
                                <?php
                                }
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
                    <button type="submit" name="updateperbandingan" value="updateperbandingan" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>