<?php include_once '../template/header.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php
$periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $_GET['id_periode'] . " ")->fetch_assoc();
$kelas = QueryOnedata("SELECT * FROM kelas WHERE id_kelas = " . $_GET['id_kelas'] . " ")->fetch_assoc();
$siswa = QueryOnedata("SELECT * FROM siswa WHERE id_siswa = " . $_GET['id_siswa'] . " ")->fetch_assoc();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Rapot Page</h1>
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
                Rapot Siswa
            </h6>
            <br>
            <a href="<?= $url . '/app/rapot/rapot_cetak.php?id_periode=' . $_GET['id_periode'] . '&id_kelas=' . $_GET['id_kelas'] . '&id_siswa=' . $_GET['id_siswa'] ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-warning btn-sm"> <i class="fa fa-print"></i> CETAK </a>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Nama Peserta Didik</td>
                        <td>:</td>
                        <td><?= $siswa['nm_siswa'] ?></td>
                        <td></td>
                        <td>Kelas </td>
                        <td>:</td>
                        <td><?= $kelas['kelas'] ?> <?= $kelas['nm_kelas'] ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Induk</td>
                        <td>:</td>
                        <td><?= $siswa['nis'] ?></td>
                        <td></td>
                        <td>Semester</td>
                        <td>:</td>
                        <td><?= $periode['nm_periode'] ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                    <tr class="text-center">
                        <td rowspan="3" style="text-align: center; vertical-align: center;" valign="center">NO</td>
                        <td rowspan="3" style="text-align: center;">Komponen</td>
                        <td rowspan="2" style="text-align: center;">Kriteria Ketuntasan Minimal (KKM) </td>
                        <td colspan="2">Hasil Hasil Belajar</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="2">Pengetahuan</td>
                    </tr>
                    <tr class="text-center">
                        <td>Angka</td>
                        <td>Angka</td>
                        <td>Huruf</td>
                    </tr>
                    <tr>
                        <td>A</td>
                        <td>Mata Pelajaran</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                    $mapels = "SELECT mapel.id_mapel, mapel.nm_mapel FROM mapel 
                            LEFT JOIN jadwal_siswa ON mapel.id_mapel = jadwal_siswa.id_mapel  
                            LEFT JOIN siswa ON siswa.id_siswa = jadwal_siswa.id_siswa
                            WHERE mapel.id_periode = " . $_GET["id_periode"] . " 
                            AND jadwal_siswa.id_kelas = " . $_GET["id_kelas"] . "
                            AND jadwal_siswa.id_siswa = " . $_GET["id_siswa"] . "
                            GROUP BY mapel.id_mapel ";
                    $no = 1;
                    foreach (QueryManyData($mapels) as $row) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nm_mapel']; ?> </td>
                            <td>
                                <?php
                                //check periode sebelumnya
                                $val_prev_1 = 0;
                                $val_prev_2 = 0;
                                $val_prev_3 = 0;
                                $arg_3_periode = [];

                                $prev_1 = QueryOnedata("SELECT * FROM periode WHERE id_periode < " . $_GET['id_periode'] . " ORDER BY id_periode DESC");
                                if ($prev_1->num_rows > 0) {
                                    $val_prev_1 = $prev_1->fetch_assoc();

                                    $nilai_rata2_prev_3 = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                        WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                                        " AND mapel.id_periode = " . $val_prev_3['id_periode'] .
                                        " AND jadwal_siswa.id_kelas = " . $_GET['id_kelas'] . "";
                                    $avg_prev_3 = QueryOnedata($nilai_rata2_prev_3);
                                    array_push($arg_3_periode, $avg_prev_3->fetch_assoc()['nilai']);

                                    $prev_2 = QueryOnedata("SELECT * FROM periode WHERE id_periode < " . $prev_1->fetch_assoc()['id_periode'] . " ");
                                    if ($prev_2->num_rows > 0) {
                                        $val_prev_2 = $prev_2->fetch_assoc();

                                        $nilai_rata2_prev_2 = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                                            LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                            LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                            WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                                            " AND mapel.id_periode = " . $val_prev_2['id_periode'] .
                                            " AND jadwal_siswa.id_kelas = " . $_GET['id_kelas'] . "";
                                        $avg_prev_2 = QueryOnedata($nilai_rata2_prev_2);
                                        array_push($arg_3_periode, $avg_prev_2->fetch_assoc()['nilai']);

                                        $prev_3 = QueryOnedata("SELECT * FROM periode WHERE id_periode < " . $prev_2->fetch_assoc()['id_periode'] . " ");
                                        if ($prev_3->num_rows > 0) {
                                            $val_prev_3 = $prev_3->fetch_assoc();

                                            $nilai_rata2_prev_1 = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                                                LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                                LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                                WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                                                " AND mapel.id_periode = " . $val_prev_1['id_periode'] .
                                                " AND jadwal_siswa.id_kelas = " . $_GET['id_kelas'] . "";
                                            $avg_prev_1 = QueryOnedata($nilai_rata2_prev_1);
                                            array_push($arg_3_periode, $avg_prev_1->fetch_assoc()['nilai']);
                                        }
                                    }
                                }
                                if (count($arg_3_periode) != 0) {
                                    echo  $jumlah = (array_sum($arg_3_periode) / count($arg_3_periode));
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                echo round(QueryOnedata("SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                                LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                WHERE mapel.id_mapel = " . $row['id_mapel'] .
                                    " AND jadwal_siswa.id_siswa = " . $_GET['id_siswa'] .
                                    " AND mapel.id_periode = " . $_GET['id_periode'] .
                                    " AND jadwal_siswa.id_kelas = " . $_GET['id_kelas'] . "")->fetch_assoc()['nilai']);
                                ?>
                            </td>
                            <td>
                                <?php
                                $huruf = terbilang(round(QueryOnedata("SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                                 LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                 LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                 WHERE mapel.id_mapel = " . $row['id_mapel'] .
                                    " AND jadwal_siswa.id_siswa = " . $_GET['id_siswa'] .
                                    " AND mapel.id_periode = " . $_GET['id_periode'] .
                                    " AND jadwal_siswa.id_kelas = " . $_GET['id_kelas'] . "")->fetch_assoc()['nilai']));
                                echo ucwords($huruf);
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kegiatan Ekstra kulikuler</th>
                        <th>Angka</th>
                        <th>Huruf</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ekstra_kulikuler = "SELECT * FROM nilai_ekstra 
                        JOIN ekstra_siswa ON nilai_ekstra.id_ekstra_siswa = ekstra_siswa.id_ekstra_siswa 
                        WHERE nilai_ekstra.id_siswa = " . $_GET['id_siswa'] . " 
                        AND ekstra_siswa.id_periode = " . $_GET['id_periode'] . "";
                    foreach (QueryManyData($ekstra_kulikuler) as $row) {
                        $ekstra = QueryOnedata("SELECT * FROM ekstra WHERE id_ekstra = " . $row['id_ekstra'] . "")->fetch_assoc();
                    ?>
                        <tr>
                            <td><?= $ekstra['nm_ekstra'] ?></td>
                            <td><?= $row['nilai'] ?></td>
                            <td><?= ucwords(terbilang($row['nilai'])) ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <table>
                <body>
                    <tr>
                        <td style="width: 400px;"></td>
                        <td style="width: 400px;"></td>
                        <td>
                            <div class="text-center">Wali Murid</div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="text-center"><?= $siswa['nm_wali'] ?></div>
                        </td>
                    </tr>
                </body>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include_once '../template/footer.php'; ?>