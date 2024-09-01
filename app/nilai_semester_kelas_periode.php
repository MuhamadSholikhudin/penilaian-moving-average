<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>
<?php
$kelas = QueryOnedata("SELECT * FROM kelas WHERE kelas = " . $_GET['kelas'] . " ")->fetch_assoc();
$periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $_GET['id_periode'] . " ")->fetch_assoc();

//menampilkan data mapel
$mapel = "SELECT mapel.id_mapel, mapel.nm_mapel FROM mapel 
    LEFT JOIN jadwal_siswa ON mapel.id_mapel = jadwal_siswa.id_mapel 
    LEFT JOIN siswa ON siswa.id_siswa = jadwal_siswa.id_siswa 
    LEFT JOIN kelas ON kelas.id_kelas = siswa.id_kelas 
    WHERE kelas.kelas = ".$_GET['kelas'].
    " AND mapel.id_periode = ". $_GET['id_periode'].
    " GROUP BY mapel.id_mapel";
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Nilai Periode Page</h1>
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
                Data Nilai Periode Kelas <?= $kelas['kelas'] ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Periode</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $noi = 1;
                        foreach (QueryManyData($mapel) as $row) { ?>
                            <tr>
                                <td><?= $noi++; ?></td>
                                <td><?= $row['nm_mapel'] ?></td>
                                <td><?= $periode['nm_periode'] ?></td>
                                <td>
                                    <a href="<?= $url ?>/app/nilai_semester_kelas_periode_mapel.php?kelas=<?= $_GET["kelas"] ?>&id_periode=<?= $_GET["id_periode"] ?>&id_mapel=<?= $row["id_mapel"] ?>" class="btn btn-info btn-sm ">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>