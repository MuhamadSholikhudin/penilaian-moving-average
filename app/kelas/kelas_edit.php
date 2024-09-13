<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<?php 
$kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = ".$_GET['id_kelas']." ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kriteria Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/kelas/kelas.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Kriteria
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/kelas.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id_kelas" name="id_kelas" value="<?= $kelas['id_kelas'] ?>" required>
                <div class="mb-3 row">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="kelas" value="<?= $kelas['kelas'] ?>" name="kelas" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nm_kelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nm_kelas" name="nm_kelas" value="<?= $kelas['nm_kelas'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="updatekelas" value="updatekelas" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>