<?php 
include_once '../template/header.php'; 
include_once '../template/sidebar.php'; 
include_once '../template/navbar.php'; 

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwal Siswa Page</h1>
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
                <a href="<?= $url ?>/app/jadwal_siswa/jadwal_siswa_hari.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fa fa-arrow-left"></i>
                </a>
                Data Jadwal Siswa Hari <?= $_GET['hari'] ?>
            </h6>
        </div>
        <div class="card-body table-responsive">
            <table id="example" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Mapel</th>
                        <th>Guru</th>
                        <th>Hari</th>
                        <th>Waktu Awal</th>
                        <th>Waktu Akhir</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM jadwal_siswa WHERE hari = '".$_GET['hari']."'") as $row) {
                        $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $row['id_siswa'] . " ")->fetch_assoc();
                        $mapel = QueryOnedata("SELECT * FROM mapel WHERE id_mapel = " . $row['id_mapel'] . " ")->fetch_assoc();
                        $guru = QueryOnedata("SELECT * FROM guru WHERE id_guru = " . $row['id_guru'] . " ")->fetch_assoc();
                    ?>
                        <tr>
                            <td><?= $siswa["nm_siswa"] ?></td>
                            <td><?= $mapel["nm_mapel"] ?></td>
                            <td><?= $guru["nm_guru"] ?></td>
                            <td><?= $row["hari"] ?></td>
                            <td><?= $row["waktu_awal"] ?></td>
                            <td><?= $row["waktu_akhir"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/jadwal_siswa/jadwal_siswa_edit.php?id_jadwal_siswa=<?= $row["id_jadwal_siswa"] ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <!-- <button onclick="ConfirmDelete(<?= $row['id_jadwal_siswa'] ?>)" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button> -->
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
                window.location.href = "<?= $url ?>/aksi/jadwal_siswa.php?id_jadwal_siswa=" + id + "&action=delete";
            }
        }
    </script>
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>