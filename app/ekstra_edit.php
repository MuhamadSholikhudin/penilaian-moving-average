<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<?php 
$ekstra = QueryOnedata("SELECT * FROM ekstra WHERE id_ekstra = ".$_GET['id_ekstra']." ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Presensi Page</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/ekstra.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Presensi
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/ekstra.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="inputusername" name="id_ekstra" value="<?= $ekstra['id_ekstra'] ?>" required>
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
                    <label for="nm_ekstra" class="col-sm-2 col-form-label">Nama Ekstra</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nm_ekstra" name="nm_ekstra" value="<?= $ekstra['nm_ekstra'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="penanggung_jawab" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="<?= $ekstra['penanggung_jawab'] ?>" required>
                    </div>
                </div>              

                <div class="mb-3 row">
                    <button type="submit" name="updateekstra" value="updateekstra" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>