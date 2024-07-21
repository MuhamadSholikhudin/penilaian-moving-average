<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>

<?php
$guru = QueryOnedata("SELECT * FROM guru WHERE id_guru = " . $_GET['id_guru'] . " ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Guru Page</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/guru.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Edit Data Guru
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/app/aksi/guru.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id_guru" name="id_guru" value="<?= $guru['id_guru'] ?>" required>

                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP (Nomer Induk Guru)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nip" name="nip" value="<?= $guru['nip'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat_guru" class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nm_guru" name="nm_guru" value="<?= $guru['nm_guru'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jk_guru" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jk_guru" id="jk_guru">
                            <?php $jk_guru = ['L' => 'Laki laki', 'P' => 'Perempuan']; ?>
                            <?php foreach ($jk_guru as $key => $val) { ?>
                                <?php if ($key == $guru['jk_guru']) { ?>
                                    <option value="<?= $key ?>" selected><?= $val ?></option>
                                <?php
                                } else { ?>
                                    <option value="<?= $key ?>"><?= $val ?></option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat_guru" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat_guru" name="alamat_guru" value="<?= $guru['alamat_guru'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $guru['tgl_lahir'] ?>"  required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_hp_guru" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_hp_guru" name="no_hp_guru" value="<?= $guru['no_hp_guru'] ?>"  required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="foto" name="foto" >
                        <input type="hidden" class="form-control" id="foto_old" name="foto_old" value="<?= $guru['foto'] ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="updateguru" value="updateguru" class="btn btn-success btn-user btn-block">
                        <i class="fas fa-edit"></i> UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>