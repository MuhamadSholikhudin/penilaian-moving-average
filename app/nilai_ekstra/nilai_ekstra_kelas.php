<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Nilai Siswa Page</h1>
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
                Data Nilai Ekstra
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
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= $url ?>/app/nilai_mapel/nilai_mapel.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Data Nilai Ekstra Kelas 
            </h6>          
        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Jumlah</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM nilai_ekstra LEFT JOIN jadwal_siswa ON nilai_ekstra.id_jadwal = jadwal_siswa.id_jadwal_siswa GROUP BY jadwal_siswa.id_kelas ";
                    foreach (QueryManyData($query) as $row) {
                        $kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $row['id_kelas'] . " ")->fetch_assoc();
                        $nilai = QueryOnedata("SELECT COUNT(*) as count FROM nilai_ekstra LEFT JOIN jadwal_siswa ON nilai_ekstra.id_jadwal = jadwal_siswa.id_jadwal_siswa WHERE jadwal_siswa.id_kelas = " . $row['id_kelas'] . " ")->fetch_assoc();
                    ?>
                        <tr>
                            <td><?= $kelas["kelas"] ?> <?= $kelas["nm_kelas"] ?></td>
                            <td><?= $nilai["count"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/nilai_ekstra/nilai_ekstra_idkelas.php?id_kelas=<?= $row["id_kelas"] ?>" class="btn btn-info ">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
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
                window.location.href = "<?= $url ?>/app/aksi/jadwal_siswa.php?id_jadwal_siswa=" + id + "&action=delete";
            }
        }
    </script>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>