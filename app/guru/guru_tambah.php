<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Guru Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/guru/guru.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Tambah Data Guru
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/guru.php" method="post" enctype="multipart/form-data">           
                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP (Nomer Induk Guru)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nip" name="nip" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nm_guru" class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nm_guru" name="nm_guru" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jk_guru" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="jk_guru" id="jk_guru">
                            <?php $jk_guru = ['L' => 'Laki laki', 'P' => 'Perempuan']; ?>
                            <?php foreach($jk_guru as $key => $val){ ?>                          
                                <option value="<?= $key ?>"><?= $val ?></option>
                            <?php } ?>
                        </select>
                    </div>                
                </div>
                <div class="mb-3 row">
                    <label for="alamat_guru" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat_guru" name="alamat_guru" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_hp_guru" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_hp_guru" name="no_hp_guru" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="foto" name="foto" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="simpanguru" value="simpanguru" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>