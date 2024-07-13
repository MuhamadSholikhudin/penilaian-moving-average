<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

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
                <a href="<?= $url ?>/app/mapel.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Perawatan
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/mapel.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="inputusername" name="id_mapel" value="<?= $mapel['id_mapel'] ?>" required>    
                <div class="mb-3 row">
                    <label for="kode_pelajaran" class="col-sm-2 col-form-label">Tipe Pelajaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_pelajaran" name="kode_pelajaran" value="<?= $mapel['kode_pelajaran'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_pelajaran" class="col-sm-2 col-form-label">Nama Pelajaran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran" value="<?= $mapel['nama_pelajaran'] ?>"  required>
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

<?php include_once './template/footer.php'; ?>