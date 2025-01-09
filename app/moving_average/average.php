<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php
$kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $_GET['id_kelas'] . " ")->fetch_assoc();
$mapel = QueryOnedata("SELECT * FROM mapel WHERE id_mapel = " . $_GET['id_mapel'] . " ")->fetch_assoc();
$periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $_GET['id_periode'] . " ")->fetch_assoc();

//check periode sebelumnya
$val_prev_1 = 0;
$val_prev_2 = 0;
$val_prev_3 = 0;

$prev_1 = QueryOnedata("SELECT * FROM periode WHERE id_periode < " . $_GET['id_periode'] . " ORDER BY id_periode DESC");
if ($prev_1->num_rows > 0) {
    $val_prev_1 = QueryOnedata("SELECT * FROM periode WHERE id_periode < " . $_GET['id_periode'] . " ORDER BY id_periode DESC")->fetch_assoc();
    $prev_2 = QueryOnedata("SELECT * FROM periode WHERE id_periode < " . $prev_1->fetch_assoc()['id_periode'] . " ");
    if ($prev_2->num_rows > 0) {
        $val_prev_2 = QueryOnedata("SELECT * FROM periode WHERE id_periode < " . $prev_1->fetch_assoc()['id_periode'] . " ")->fetch_assoc();

        $prev_3 = QueryOnedata("SELECT * FROM periode WHERE id_periode < " . $prev_2->fetch_assoc()['id_periode'] . " ");
        if ($prev_3->num_rows > 0) {
            $val_prev_3 = QueryOnedata("SELECT * FROM periode WHERE id_periode < " . $prev_2->fetch_assoc()['id_periode'] . " ")->fetch_assoc();
        }
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Moving Average </h1>
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
                Moving Average <?= $periode['nm_periode'] ?> kelas <?= $kelas['kelas'] . " " . $kelas['nm_kelas'] ?> Mapel <?= $mapel['nm_mapel'] ?>
            </h6>
        </div>
        <div class="card-body  table-responsive">
            <table id="example" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th>
                        </th>
                        <th>
                            <?php
                            if ($val_prev_3 != 0) {
                                echo $val_prev_3['nm_periode'];
                            } else {
                                echo "-";
                            }
                            ?>
                        </th>
                        <th>
                            <?php
                            if ($val_prev_2 != 0) {
                                echo $val_prev_2['nm_periode'];
                            } else {
                                echo "-";
                            }
                            ?>
                        </th>
                        <th>
                            <?php
                            if ($val_prev_1 != 0) {
                                echo $val_prev_1['nm_periode'];
                            } else {
                                echo "-";
                            }
                            ?>
                        </th>
                        <th><?= $periode['nm_periode'] ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $arg_3_periode = [];
                    ?>
                    <tr>
                        <td>Rata-Rata</td>
                        <td>
                            <?php
                            if ($val_prev_3 != 0) {
                                // echo $val_prev_3['nm_periode'];
                                $nilai_rata2_prev_3 = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                                    LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                    LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                    WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                                    " AND mapel.id_periode = " . $val_prev_3['id_periode'] .
                                    " AND jadwal_siswa.id_kelas = " . $_GET['id_kelas'] . "";
                                $avg_prev_3 = QueryOnedata($nilai_rata2_prev_3);
                                echo $avg_prev_3->fetch_assoc()['nilai'];
                                array_push($arg_3_periode, QueryOnedata($nilai_rata2_prev_3)->fetch_assoc()['nilai']);
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($val_prev_2 != 0) {
                                $nilai_rata2_prev_2 = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                                    LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                    LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                    WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                                    " AND mapel.id_periode = " . $val_prev_2['id_periode'] .
                                    " AND jadwal_siswa.id_kelas = " . $_GET['id_kelas'] . "";
                                $avg_prev_2 = QueryOnedata($nilai_rata2_prev_2);
                                echo $avg_prev_2->fetch_assoc()['nilai'];
                                array_push($arg_3_periode, QueryOnedata($nilai_rata2_prev_2)->fetch_assoc()['nilai']);
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($val_prev_1 != 0) {
                                // echo $val_prev_1['nm_periode'];
                                $nilai_rata2_prev_1 = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                                    LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                    LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                    WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                                    " AND mapel.id_periode = " . $val_prev_1['id_periode'] .
                                    " AND jadwal_siswa.id_kelas = " . $_GET['id_kelas'] . "";
                                $avg_prev_1 = QueryOnedata($nilai_rata2_prev_1);
                                echo $avg_prev_1->fetch_assoc()['nilai'];
                                array_push($arg_3_periode, QueryOnedata($nilai_rata2_prev_1)->fetch_assoc()['nilai']);
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $nilai_rata2_semster_sekarang = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                                LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                                " AND mapel.id_periode = " . $periode['id_periode'] .
                                " AND jadwal_siswa.id_kelas = " . $_GET['id_kelas'] . "";
                            $avg_current = QueryOnedata($nilai_rata2_semster_sekarang);
                            echo $avg_current->fetch_assoc()['nilai'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>SKBM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <?php
                            if (count($arg_3_periode) != 0) {
                                echo  $jumlah = (array_sum($arg_3_periode) / count($arg_3_periode));
                            }
                            ?>
                        </td>
                    </tr>
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