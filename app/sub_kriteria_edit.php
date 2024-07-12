<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<?php 
$sub_kriteria = QueryOnedata("SELECT * FROM sub_kriteria WHERE id_sub_kriteria = ".$_GET['id_sub_kriteria']." ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kriteria Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/sub_kriteria.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Kriteria
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/sub_kriteria.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <input type="hidden" class="form-control" id="id_sub_kriteria" name="id_sub_kriteria" value="<?= $sub_kriteria['id_sub_kriteria'] ?>" required>
                    <label for="id_kriteria" class="col-sm-2 col-form-label">Alat Berat</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_kriteria" id="id_kriteria">
                            <?php
                            foreach(QueryManyData("SELECT * FROM kriteria ") as $row) {
                                if($row["id_kriteria"] == $sub_kriteria["id_kriteria"] ){
                                    ?>
                                    <option value="<?= $row["id_kriteria"] ?>" selected><?= $row["nama_kriteria"] ?></option>
                                <?php
                                }else{
                                    ?>
                                    <option value="<?= $row["id_kriteria"] ?>"><?= $row["nama_kriteria"] ?></option>
                                <?php
                                }
                           
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sub_kriteria" class="col-sm-2 col-form-label">Sub Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sub_kriteria" name="sub_kriteria" value="<?= $sub_kriteria["sub_kriteria"] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea type="number" class="form-control" id="deskripsi" name="deskripsi" required><?= $sub_kriteria["deskripsi"] ?></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="updatesub_kriteria" value="updatesub_kriteria" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>