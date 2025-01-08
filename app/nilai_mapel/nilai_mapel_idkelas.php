<?php include_once '../template/header.php'; 
include_once '../template/sidebar.php'; 
include_once '../template/navbar.php';
$kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = ".$_GET['id_kelas']." ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Nilai Mapel Siswa Page</h1>
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
                <a href="<?= $url ?>/app/nilai_mapel/nilai_mapel_kelas.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left" data-toggle="tooltip" data-placement="top" title="Tambah Data nilai mapel" ></i>
                </a>               
                Data Nilai Mapel Kelas  <?= $kelas['kelas']." ".$kelas['nm_kelas'] ?>
            </h6>
        </div>
        <div class="card-body table-responsive">
            <table id="example" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Mapel</th>
                        <th>Nilai</th>
                        <th>Ket Nilai</th>
                        <th>Periode</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM nilai_mapel LEFT JOIN jadwal_siswa ON nilai_mapel.id_jadwal = jadwal_siswa.id_jadwal_siswa WHERE jadwal_siswa.id_kelas = ".$_GET['id_kelas']." ") as $row) {
                        $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $row['id_siswa'] . " ")->fetch_assoc();
                        $mapel = QueryOnedata("SELECT mapel.nm_mapel, mapel.id_periode FROM mapel LEFT JOIN jadwal_siswa ON mapel.id_mapel = jadwal_siswa.id_mapel WHERE jadwal_siswa.id_jadwal_siswa = " . $row['id_jadwal'] . " ")->fetch_assoc();
                        $periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $mapel['id_periode'] . " ")->fetch_assoc(); 

                    ?>
                        <tr>
                            <td><?= $siswa["nm_siswa"] ?></td>
                            <td>
                                <?= $mapel["nm_mapel"] ?>
                            </td>
                            <td><?= $row["nilai"] ?></td>
                            <td><?= $row["ket_nilai"] ?></td>
                            <td><?= $periode["nm_periode"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/nilai_mapel_edit.php?id_nilai_mapel=<?= $row["id_nilai_mapel"] ?>" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-edit"></i>
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