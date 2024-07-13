<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pegawai Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/pegawai.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Tambah Data Pegawai
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/pegawai.php" method="post" enctype="multipart/form-data">           
                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP (Nomer Induk Pegawai)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nip" name="nip" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="jabatan" id="jabatan">
                            <?php $jabatan = ['guru' => 'Guru', 'waka_kesiswaan' => 'Waka Kesiswaan']; ?>
                            <?php foreach($jabatan as $key => $val){ ?>                          
                                <option value="<?= $key ?>"><?= $val ?></option>
                            <?php } ?>
                        </select>
                    </div>                
                </div>
                <div class="mb-3 row">
                    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="simpanpegawai" value="simpanpegawai" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>