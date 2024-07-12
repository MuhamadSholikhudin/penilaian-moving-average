<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<?php 
$kriteria = QueryOnedata("SELECT * FROM kriteria WHERE id_kriteria = ".$_GET['id_kriteria']." ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kriteria Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/kriteria.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Kriteria
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/kriteria.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="inputusername" name="id_kriteria" value="<?= $kriteria['id_kriteria'] ?>" required>
            
                <div class="mb-3 row">
                    <label for="nama_kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria"value="<?= $kriteria['nama_kriteria'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea type="number" class="form-control" id="deskripsi" name="deskripsi" required><?= $kriteria['deskripsi'] ?></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <button type="submit" name="updatekriteria" value="updatekriteria" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>