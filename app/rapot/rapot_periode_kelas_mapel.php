<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>

<?php
$periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $_GET['id_periode'] . " ")->fetch_assoc();
$kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $_GET['id_kelas'] . " ")->fetch_assoc();
$mapel = QueryOnedata("SELECT * FROM mapel WHERE id_mapel = " . $_GET['id_mapel'] . " ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Nilai kelas periode <?= $periode['nm_periode'] ?></h1>
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
                Data Kelas semester
            </h6>
        </div>
        <div class="card-body table-responsive">
            <table id="example" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Nama Siswa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menampilkan data kelas dengan periode id_periode = $_GET['id_periode']
                    $get_siswa = "SELECT siswa.id_siswa, siswa.nm_siswa FROM siswa 
                        LEFT JOIN jadwal_siswa ON siswa.id_siswa = jadwal_siswa.id_siswa                       
                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                        WHERE mapel.id_periode = " . $_GET["id_periode"] . " 
                        AND jadwal_siswa.id_kelas = " . $_GET["id_kelas"] . "
                        AND jadwal_siswa.id_mapel = " . $_GET["id_mapel"] . "
                        GROUP BY siswa.id_siswa                        
                        ";
                    foreach (QueryManyData($get_siswa) as $row) {
                    ?>
                        <tr>
                            <td><?= $kelas["kelas"] ?> <?= $kelas["nm_kelas"] ?></td>
                            <td><?= $row["nm_siswa"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/rapot/rapot_lihat.php?id_periode=<?= $_GET["id_periode"] ?>&id_kelas=<?= $_GET["id_kelas"] ?>&id_mapel=<?= $mapel["id_mapel"] ?>&id_siswa=<?= $row['id_siswa'] ?>" class="btn btn-info btn-sm ">
                                    <i class="fas fa-eye"></i> Lihat
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
                window.location.href = "<?= $url ?>/app/aksi/mapel.php?id_mapel=" + id + "&action=delete";
            }
        }
    </script>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>