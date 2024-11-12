<?php 
include_once '../template/header.php'; 
include_once '../template/sidebar.php'; 
include_once '../template/navbar.php'; 
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
                Data Kehadiran siswa Kelas 
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
                    $query = "SELECT * FROM kehadiran_siswa LEFT JOIN siswa ON kehadiran_siswa.id_siswa  =  siswa.id_siswa GROUP BY siswa.id_kelas ";
                    foreach (QueryManyData($query) as $row) {
                        $kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $row['id_kelas'] . " ")->fetch_assoc();
                        $siswa = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $row['id_kelas'] . " ")->fetch_assoc();
                    ?>
                        <tr>
                            <td><?= $kelas["kelas"] ?> <?= $kelas["nm_kelas"] ?></td>
                            <td><?= $row["tgl_masuk"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/kehadiran_siswa/kehadiran_siswa_edit.php?id_kehadiran=<?= $row["id_kehadiran"] ?>" class="btn btn-info ">
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
                window.location.href = "<?= $url ?>/app/aksi/kehadiran_siswa.php?id_kehadiran=" + id + "&action=delete";
            }
        }
    </script>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>