<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwal Siswa Page</h1>
    <?php
    if (isset($_SESSION['message'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['message']);
    }
    ?>

    <?php if($_SESSION['level'] == 'wakasiswa'){ ?> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">

                Data Jadwal Siswa
            </h6>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Kelas</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <a href="<?= $url ?>/app/jadwal_siswa/jadwal_siswa_kelas.php" class="btn btn-facebook btn-block"><i class="fa fa-arrow-circle-right fa-fw"></i> Lihat Data</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center  justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary " style="text-align: center;">Hari</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <a href="<?= $url ?>/app/jadwal_siswa/jadwal_siswa_hari.php" class="btn btn-facebook btn-block"><i class="fa fa-arrow-circle-right fa-fw"></i> Lihat Data</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Mapel</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <a href="<?= $url ?>/app/jadwal_siswa/jadwal_siswa_mapel.php" class="btn btn-facebook btn-block"><i class="fa fa-arrow-circle-right fa-fw"></i> Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/jadwal_siswa/jadwal_siswa_tambah.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-plus"></i>
                </a>
                Data Jadwal Siswa
            </h6>
        </div>


        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Mapel</th>
                        <th>Guru</th>
                        <th>Hari</th>
                        <th>Waktu Awal</th>
                        <th>Waktu Akhir</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM jadwal_siswa ") as $row) {
                        $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $row['id_siswa'] . " ")->fetch_assoc();
                        $mapel = QueryOnedata("SELECT * FROM mapel WHERE id_mapel = " . $row['id_mapel'] . " ")->fetch_assoc();
                        $guru = QueryOnedata("SELECT * FROM guru WHERE id_guru = " . $row['id_guru'] . " ")->fetch_assoc();
                    ?>
                        <tr>
                            <td><?= $siswa["nm_siswa"] ?></td>
                            <td>

                                <?= $mapel["nm_mapel"] ?>
                            </td>
                            <td><?= $guru["nm_guru"] ?></td>
                            <td><?= $row["hari"] ?></td>
                            <td><?= $row["waktu_awal"] ?></td>
                            <td><?= $row["waktu_akhir"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/jadwal_siswa/jadwal_siswa_edit.php?id_jadwal_siswa=<?= $row["id_jadwal_siswa"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="ConfirmDelete(<?= $row['id_jadwal_siswa'] ?>)" class="btn btn-danger btn-sm btn-circle">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function ConfirmDelete(id) {
            let text = "Apakah Anda Yakin Ingin Menghapus data!\n OK or Cancel.";
            if (confirm(text) == true) {
                text = "You pressed OK!";
                window.location.href = "<?= $url ?>/aksi/jadwal_siswa.php?id_jadwal_siswa=" + id + "&action=delete";
            }
        }
    </script>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>