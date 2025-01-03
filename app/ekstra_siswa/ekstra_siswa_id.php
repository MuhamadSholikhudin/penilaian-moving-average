<?php include_once '../template/header.php'; 
 include_once '../template/sidebar.php'; 
 include_once '../template/navbar.php'; 
 $ekstra = QueryOnedata("SELECT * FROM ekstra WHERE id_ekstra = ".$_GET['id_ekstra']." ")->fetch_assoc();
 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwal Ekstra Page</h1>
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
                <a href="<?= $url ?>/app/ekstra_siswa/ekstra_siswa.php" class="btn btn-info btn-sm btn-circle">
                    <i class="fas fa-arrow-left"></i>
                </a>
                Data Jadwal Ekstra <?= $ekstra['nm_ekstra'] ?> [<?= $ekstra['penanggung_jawab'] ?>]
            </h6>

        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Kelas</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (QueryManyData("SELECT * FROM ekstra_siswa WHERE id_ekstra = ".$_GET['id_ekstra']."") as $row) {
                        $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $row['id_siswa'] . " ")->fetch_assoc();
                        $kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $siswa['id_kelas'] . " ")->fetch_assoc();
                    ?>
                        <tr>
                            <td><?= $siswa["nm_siswa"] ?></td>
                            <td><?= $kelas["kelas"] ?> <?= $kelas["nm_kelas"] ?></td>
                            <td>
                                <a href="<?= $url ?>/app/ekstra_siswa/ekstra_siswa_edit.php?id_ekstra_siswa=<?= $row["id_ekstra_siswa"] ?>" class="btn btn-warning btn-sm ">
                                    <i class="fas fa-edit"></i> edit
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
</div>
<!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>