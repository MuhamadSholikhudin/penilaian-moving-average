<?php 
include_once '../template/header.php'; 
include_once '../template/sidebar.php'; 
include_once '../template/navbar.php'; 
$kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = ".$_GET['id_kelas']."")->fetch_assoc();
?>

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
                <a href="<?= $url ?>/app/kehadiran_siswa/kehadiran_siswa_kelas.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>        
                Data Kehadiran Siswa Kelas <?= $kelas['kelas']." ".$kelas['nm_kelas'] ?>
            </h6>
        </div>

        <div class="card-body  table-responsive">
            <table id="example" class="display  table" style="width:100%">
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_kehadiran_per_kelas = "SELECT * FROM kehadiran_siswa JOIN siswa ON kehadiran_siswa.id_siswa = siswa.id_siswa WHERE siswa.id_kelas = ".$_GET['id_kelas'].""; 
                    foreach (QueryManyData($query_kehadiran_per_kelas) as $row) {
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