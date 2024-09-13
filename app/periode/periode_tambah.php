<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Periode Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/periode/periode.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Tambah Data Periode
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/periode.php" method="post" enctype="multipart/form-data">           
                <div class="mb-3 row">
                    <label for="nm_periode" class="col-sm-2 col-form-label">Nama Periode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nm_periode" name="nm_periode" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <?php 
                            $status = [
                                "active",
                                "non-active",
                            ];
                        ?>
                        <select class="form-control" name="status_periode" id="status">
                            <?php
                            foreach($status as $val) {                                
                            ?>
                                <option value="<?= $val ?>"><?= $val ?></option>
                            <?php
                                                          
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <button type="submit" name="simpanperiode" value="simpanperiode" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>