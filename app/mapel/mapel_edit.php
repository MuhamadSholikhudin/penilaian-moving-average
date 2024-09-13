<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<?php 
$mapel = QueryOnedata("SELECT * FROM mapel WHERE id_mapel = ".$_GET['id_mapel']." ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perawatan Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/mapel/mapel.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Perawatan
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/mapel.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="inputusername" name="id_mapel" value="<?= $mapel['id_mapel'] ?>" required>    
                <div class="mb-3 row">
                    <label for="nm_mapel" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nm_mapel" name="nm_mapel" value="<?= $mapel['nm_mapel'] ?>"  required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Periode</label>
                    <div class="col-sm-10">                        
                        <select class="form-control" name="id_periode" id="status">
                            <?php
                            foreach (QueryManyData("SELECT * FROM periode ") as $row) {
                                if($row['id_periode'] == $mapel['id_periode']){
                                    ?>
                                    <option value="<?= $row['id_periode'] ?>" selected><?= $row['nm_periode'] ?></option>
                                <?php
                                }else{
                                    ?>
                                    <option value="<?= $row['id_periode'] ?>"><?= $row['nm_periode'] ?></option>
                                <?php
                                }                            
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="updatemapel" value="updatemapel" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>