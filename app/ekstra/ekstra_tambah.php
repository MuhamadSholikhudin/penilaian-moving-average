<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ekstra Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/ekstra/ekstra.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Tambah Data Ekstra
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/ekstra.php" method="post" enctype="multipart/form-data">          
                <div class="mb-3 row">
                    <label for="id_periode" class="col-sm-2 col-form-label">Periode</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_periode" id="id_periode">
                            <?php
                            foreach(QueryManyData("SELECT * FROM periode ") as $row) {
                            ?>
                                <option value="<?= $row["id_periode"] ?>"> <?= $row["nm_periode"] ?> </option>
                            <?php
                            }
                            ?>
                        </select>                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nm_ekstra" class="col-sm-2 col-form-label">Nama Ekstra</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nm_ekstra" name="nm_ekstra" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="penanggung_jawab" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" required>
                    </div>
                </div>              
                <div class="mb-3 row">
                    <button type="submit" name="simpanekstra" value="simpanekstra" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>