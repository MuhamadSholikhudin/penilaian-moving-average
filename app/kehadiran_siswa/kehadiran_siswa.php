<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kehadiran Siswa Page</h1>
    <?php
    if (isset($_SESSION['message'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success !</strong> <?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['message']);
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Kehadiran siswa
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
                            <a href="<?= $url ?>/app/kehadiran_siswa/kehadiran_siswa_kelas.php" class="btn btn-facebook btn-block"><i class="fa fa-arrow-circle-right fa-fw"></i> Lihat Data</a>
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
                            <a href="<?= $url ?>/app/kehadiran_siswa/kehadiran_siswa_hari.php" class="btn btn-facebook btn-block"><i class="fa fa-arrow-circle-right fa-fw"></i> Lihat Data</a>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/kehadiran_siswa/kehadiran_siswa_tambah.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-plus" data-toggle="tooltip" data-placement="top" title="Tambah Data nilai mapel"></i>
                </a>
                &nbsp;
                &nbsp;
                <button class="btn btn-secondary btn-sm btn-circle" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-upload"></i>
                </button>
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                Data Kehadiran siswa
            </h6>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Data Kehadiran siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="<?= $url ?>/aksi/upload_kehadiran_siswa.php">
                            <div class="modal-body">
                                <a href="<?= $url ?>/assets/form_upload_kehadiran_siswa.xlsx">FORMAT UPLOAD</a>
                                <br>
                                Pilih File:
                                <input name="fileExcel" type="file" required="required">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input name="upload" type="submit" value="Import" class="btn btn-primary">
                                <!-- <button type="submit" class="btn btn-primary">Upload</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Tanggal Masuk</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM kehadiran_siswa ") as $row) {
                        $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $row['id_siswa'] . " ")->fetch_assoc();
                    ?>
                        <tr>
                            <td><?= $siswa["nm_siswa"] ?></td>
                            <td><?= $row["tgl_masuk"] ?></td>
                            <td><?= $row["jam_masuk"] ?></td>
                            <td><?= $row["jam_pulang"] ?></td>
                            <td><?= $row["status"] ?></td>
                            <td><?= $row["keterangan"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/kehadiran_siswa/kehadiran_siswa_edit.php?id_kehadiran=<?= $row["id_kehadiran"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="ConfirmDelete(<?= $row['id_kehadiran'] ?>)" class="btn btn-danger btn-sm btn-circle">
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
                window.location.href = "<?= $url ?>/app/aksi/kehadiran_siswa.php?id_kehadiran=" + id + "&action=delete";
            }
        }
    </script>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>