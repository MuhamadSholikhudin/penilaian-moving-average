<?php 
include_once '../template/header.php';
include_once '../template/sidebar.php';
include_once '../template/navbar.php';
$kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $_GET['id_kelas'] . " ")->fetch_assoc();
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Nilai Ekstra Siswa Page</h1>
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
                    <a href="<?= $url ?>/app/nilai_ekstra/nilai_ekstra_kelas.php" class="btn btn-info btn-sm btn-circle">
                        <i class="fas fa-arrow-left" data-toggle="tooltip" data-placement="top" title="Tambah Data nilai ekstra"></i>
                    </a>
                    Data Nilai Ekstra Kelas <?= $kelas['kelas'] . " " . $kelas['nm_kelas'] ?>
                </h6>
            </div>
            <div class="card-body">
                <table id="example" class="display" style="width:100%" >
                        <tr>
                            <th>Siswa</th>
                            <th>Ektrakulikuler</th>
                            <th>Nilai</th>
                            <th>Keterangan</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (QueryManyData("SELECT * FROM nilai_ekstra LEFT JOIN siswa ON nilai_ekstra.id_siswa = siswa.id_siswa WHERE siswa.id_kelas = ".$_GET['id_kelas']." ") as $row) {
                            $siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $row['id_siswa'] . " ")->fetch_assoc();
                            $ekstra = QueryOnedata("SELECT ekstra.nm_ekstra FROM ekstra LEFT JOIN ekstra_siswa ON ekstra.id_ekstra = ekstra_siswa.id_ekstra WHERE ekstra_siswa.id_ekstra_siswa = " . $row['id_ekstra_siswa'] . " ")->fetch_assoc();
                        ?>
                            <tr>
                                <td><?= $siswa["nm_siswa"] ?></td>
                                <td><?= $ekstra["nm_ekstra"] ?></td>
                                <td><?= $row["nilai"] ?></td>
                                <td><?= $row["ket_nilai"] ?></td>
                                <td>
                                    <a href="<?= $url ?>/app/nilai_ekstra/nilai_ekstra_edit.php?id_nilai_ekstra=<?= $row["id_nilai_ekstra"] ?>" class="btn btn-warning btn-sm btn-circle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="ConfirmDelete(<?= $row['id_nilai_ekstra'] ?>)" class="btn btn-danger btn-sm btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </button>
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
                    window.location.href = "<?= $url ?>/app/aksi/nilai_ekstra.php?id_nilai_ekstra=" + id + "&action=delete";
                }
            }
        </script>
    </div>
    <!-- /.container-fluid -->

<?php include_once '../template/footer.php'; ?>