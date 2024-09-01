<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>
<?php
$kelas = QueryOnedata("SELECT * FROM kelas WHERE kelas = " . $_GET['kelas'] . " ")->fetch_assoc();
// menampilkan data periode berdasarkan kelas yang di pilih 

//menampilkan data siswa
$periodes = "SELECT * FROM periode 
JOIN siswa ON periode.id_periode = siswa.id_siswa 
JOIN kelas ON kelas.id_kelas = siswa.id_kelas 
WHERE kelas.kelas = ".$_GET['kelas'];

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Nilai Semester Page</h1>
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
                Data Nilai Kelas <?= $kelas['kelas'] ?>
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
                            <th>Kelas</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $noi = 1;
                        foreach (QueryManyData($periodes) as $row) { ?>
                            <tr>
                                <td><?= $noi++; ?></td>
                                <td><?= $row['kelas'] ?></td>
                                <td><?= $row['nm_periode'] ?></td>
                                <td>
                                    <a href="<?= $url ?>/app/nilai_semester_kelas_periode.php?kelas=<?= $row["kelas"] ?>&id_periode=<?= $row["id_periode"] ?>" class="btn btn-info btn-sm ">
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