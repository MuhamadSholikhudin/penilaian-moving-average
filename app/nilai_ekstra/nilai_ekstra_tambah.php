<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Nilai Ekstra Page</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/mapel/mapel.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Tambah Data Nilai Ekstra
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= $url ?>/aksi/nilai_ekstra.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="siswa" class="col-sm-2 col-form-label">Siswa</label>
                    <div class="col-sm-10">
                        <select class="form-control js-example-basic-single" name="id_siswa" id="status">
                            <?php
                            foreach (QueryManyData("SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas ") as $row) {
                            ?>
                                <option value="<?= $row['id_siswa'] ?>"><?= $row['kelas'] ?>  <?= $row['nm_kelas'] ?> <?= $row['nm_siswa'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label ">Ekstra Siswa</label>
                    <div class="col-sm-10">                        
                        <select class="form-control js-example-basic-single" name="id_ekstra_siswa" id="status">
                            <?php
                            foreach (QueryManyData("SELECT * FROM ekstra_siswa LEFT JOIN ekstra ON ekstra_siswa.id_ekstra = ekstra.id_ekstra LEFT JOIN periode ON periode.id_periode = ekstra_siswa.id_periode ORDER BY ekstra.id_periode DESC ") as $row) {
                                // $kel = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = ". $row['id_kelas'] ."")->fetch_assoc();
                            ?>
                                <option value="<?= $row['id_ekstra_siswa'] ?>"><?= $row['nm_ekstra'] ?> Kelas <?= $row['nm_ekstra'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Nilai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nilai" name="nilai" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Keterangan Nilai</label>
                    <div class="col-sm-10">                        
                        <input type="text" class="form-control" id="ket_nilai" name="ket_nilai" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" name="simpannilai_ekstra" value="simpannilai_ekstra" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include_once '../template/footer.php'; ?>