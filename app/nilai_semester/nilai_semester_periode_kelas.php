<?php include_once '../template/header.php';
include_once '../template/sidebar.php';
include_once '../template/navbar.php';
$periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $_GET['id_periode'] . " ")->fetch_assoc();
$kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $_GET['id_kelas'] . " ")->fetch_assoc();
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Nilai kelas <?= $kelas['kelas'] . " " . $kelas['nm_kelas'] ?> periode <?= $periode['nm_periode'] ?></h1>
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
                Data Nilai kelas <?= $kelas['kelas'] . " " . $kelas['nm_kelas'] ?> periode <?= $periode['nm_periode'] ?>
            </h6>
        </div>
        <div class="card-body table-responsive">
            <table id="example" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Nama Pelajaran</th>
                        <th>Lihat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menampilkan data kelas dengan periode id_periode = $_GET['id_periode']
                    $get_mapel = "SELECT mapel.id_mapel, mapel.nm_mapel FROM mapel 
                        LEFT JOIN jadwal_siswa ON mapel.id_mapel = jadwal_siswa.id_mapel
                        LEFT JOIN periode ON mapel.id_periode = periode.id_periode
                        LEFT JOIN kelas ON kelas.id_kelas = jadwal_siswa.id_kelas
                        WHERE periode.id_periode = " . $_GET["id_periode"] . " 
                        AND kelas.id_kelas = " . $_GET["id_kelas"] . "
                        GROUP BY mapel.id_mapel                        
                        ";
                    foreach (QueryManyData($get_mapel) as $row) {
                    ?>
                        <tr>
                            <td><?= $kelas["kelas"] ?></td>
                            <td><?= $row["nm_mapel"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/nilai_semester/nilai_semester_periode_kelas_mapel.php?id_periode=<?= $_GET["id_periode"] ?>&id_kelas=<?= $_GET["id_kelas"] ?>&id_mapel=<?= $row["id_mapel"] ?>" class="btn btn-info btn-sm ">
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
    <a href="<?= $url ?>/app/nilai_semester/nilai_semester_periode.php?id_periode=<?= $_GET['id_periode'] ?>" class="btn btn-primary btn-sm ">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
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