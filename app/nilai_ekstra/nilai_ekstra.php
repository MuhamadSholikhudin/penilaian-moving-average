<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Nilai Ekstra Siswa Page</h1>
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
    <?php if($_SESSION['level'] == 'wakasiswa'){ ?> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Nilai Ekstra Siswa
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
                            <a href="<?= $url ?>/app/nilai_ekstra/nilai_ekstra_kelas.php" class="btn btn-facebook btn-block"><i class="fa fa-arrow-circle-right fa-fw"></i> Lihat Data</a>
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
                <a href="<?= $url ?>/app/nilai_ekstra/nilai_ekstra_tambah.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-plus"></i>
                </a>
                Data Nilai Ekstra Siswa
            </h6>

        </div>
        <div class="card-body table-responsive">
            <table id="example" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Ektrakulikuler</th>
                        <th>Penanggung Jawab</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM nilai_ekstra ") as $row) {
                        $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $row['id_siswa'] . " ")->fetch_assoc();
                        $ekstra = QueryOnedata("SELECT ekstra.nm_ekstra, ekstra.penanggung_jawab FROM ekstra LEFT JOIN ekstra_siswa ON ekstra.id_ekstra = ekstra_siswa.id_ekstra WHERE ekstra_siswa.id_ekstra_siswa = " . $row['id_ekstra_siswa'] . " ")->fetch_assoc();
                    ?>
                        <tr>
                            <td><?= $siswa["nm_siswa"] ?></td>
                            <td><?= $ekstra["nm_ekstra"] ?></td>
                            <td><?= $ekstra["penanggung_jawab"] ?></td>
                            <td><?= $row["nilai"] ?></td>
                            <td><?= $row["ket_nilai"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/nilai_ekstra/nilai_ekstra_edit.php?id_nilai_ekstra=<?= $row["id_nilai_ekstra"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="ConfirmDelete(<?= $row['id_nilai_ekstra'] ?>)" class="btn btn-danger btn-sm btn-circle">
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
                window.location.href = "<?= $url ?>/aksi/nilai_ekstra.php?id_nilai_ekstra=" + id + "&action=delete";
            }
        }
    </script>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>