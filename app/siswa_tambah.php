<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Siswa Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/siswa.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Tambah Data Siswa
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/siswa.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="nis" class="col-sm-2 col-form-label">Nomor Induk Siswa</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nis" name="nis" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="kelamin" id="kelamin">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>                
                </div>
                <div class="mb-3 row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="agama" id="agama">
                            <option value="ISLAM">ISLAM</option>
                            <option value="KRISTEN">KRISTEN</option>
                            <option value="BUDDHA">BUDDHA</option>
                            <option value="HINDU">HINDU</option>
                            <option value="KATOLIK">KATOLIK</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="kelas" id="kelas">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>                
                </div>
                <div class="mb-3 row">
                    <label for="kelas_kategori" class="col-sm-2 col-form-label">Kelas kategori</label>
                    <div class="col-sm-10">
                        <select  class="form-control" name="kelas_kategori" id="kelas_kategori">
                            <option value="IPA">IPA</option>
                            <option value="IPS">IPS</option>
                            <option value="BAHASA">BAHASA</option>
                        </select>
                    </div>                
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="simpansiswa" value="simpansiswa" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>