<?php include_once './template/header.php'; ?>
<?php include_once './template/sidebar.php'; ?>
<?php include_once './template/navbar.php'; ?>
<?php
$mapel = QueryOnedata("SELECT * FROM mapel WHERE id_mapel = " . $_GET['id_mapel'] . " ")->fetch_assoc();
$periode = QueryOnedata("SELECT * FROM periode WHERE id_periode = " . $mapel['id_periode'] . " ")->fetch_assoc();

$siswa =    "SELECT siswa.id_siswa, siswa.nis, siswa.nm_siswa, siswa.id_kelas FROM siswa 
            LEFT JOIN jadwal_siswa ON siswa.id_siswa = jadwal_siswa.id_siswa 
            LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
            WHERE mapel.id_mapel = " . $_GET['id_mapel'] . " AND mapel.id_periode = " . $mapel['id_periode'] . "
            ";
// var_dump($siswa);
// die();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Nilai Semester Page</h1>
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
                Data Nilai Kelas <?= $_GET['kelas'] . " Mapel " . $mapel['nm_mapel'] . " " . $periode['nm_periode'] ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>UH 1</th>
                            <th>UH 2</th>
                            <th>UH 3</th>
                            <th>UH 4</th>
                            <th>UTS</th>
                            <th>UAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $noi = 1;
                        foreach (QueryManyData($siswa) as $row) { ?>
                            <tr>
                                <td><?= $noi++; ?></td>
                                <td><?= $row['nis'] . " | " . $row['nm_siswa'] ?></td>
                                <td>
                                    <?php
                                    $get_kelas = QueryOnedata("SELECT nm_kelas FROM kelas WHERE id_kelas = " . $row['id_kelas']);
                                    echo $_GET['kelas'] . " " . $get_kelas->fetch_assoc()['nm_kelas'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sql_nilai_uh1 = "SELECT COALESCE(nilai_mapel.nilai, '-') as nilai FROM nilai_mapel 
                                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                        WHERE nilai_mapel.id_siswa = " . $row['id_siswa'] .
                                        " AND mapel.id_mapel = " . $mapel['id_mapel'] .
                                        " AND mapel.id_periode = " . $periode['id_periode'] .
                                        " AND nilai_mapel.ket_nilai = 'UH1'";
                                    // var_dump($sql_nilai_uh1);
                                    // die();
                                    $nilai_uh1 = QueryOnedata($sql_nilai_uh1);
                                    if ($nilai_uh1->num_rows > 0) {
                                        echo $nilai_uh1->fetch_assoc()['nilai'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sql_nilai_uh2 = "SELECT COALESCE(nilai_mapel.nilai, '-') as nilai FROM nilai_mapel 
                                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                        WHERE nilai_mapel.id_siswa = " . $row['id_siswa'] .
                                        " AND mapel.id_mapel = " . $mapel['id_mapel'] .
                                        " AND mapel.id_periode = " . $periode['id_periode'] .
                                        " AND nilai_mapel.ket_nilai = 'UH2'";
                                    $nilai_uh2 = QueryOnedata($sql_nilai_uh2);
                                    if ($nilai_uh2->num_rows > 0) {
                                        echo $nilai_uh2->fetch_assoc()['nilai'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sql_nilai_uh3 = "SELECT COALESCE(nilai_mapel.nilai, '-') as nilai FROM nilai_mapel 
                                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                        WHERE nilai_mapel.id_siswa = " . $row['id_siswa'] .
                                        " AND mapel.id_mapel = " . $mapel['id_mapel'] .
                                        " AND mapel.id_periode = " . $periode['id_periode'] .
                                        " AND nilai_mapel.ket_nilai = 'UH3'";
                                    $nilai_uh3 = QueryOnedata($sql_nilai_uh3);
                                    if ($nilai_uh3->num_rows > 0) {
                                        echo $nilai_uh3->fetch_assoc()['nilai'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sql_nilai_uh4 = "SELECT COALESCE(nilai_mapel.nilai, '-') as nilai FROM nilai_mapel 
                                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                        WHERE nilai_mapel.id_siswa = " . $row['id_siswa'] .
                                        " AND mapel.id_mapel = " . $mapel['id_mapel'] .
                                        " AND mapel.id_periode = " . $periode['id_periode'] .
                                        " AND nilai_mapel.ket_nilai = 'UH4'";
                                    $nilai_uh4 = QueryOnedata($sql_nilai_uh4);
                                    if ($nilai_uh4->num_rows > 0) {
                                        echo $nilai_uh4->fetch_assoc()['nilai'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sql_nilai_uts = "SELECT COALESCE(nilai_mapel.nilai, '-') as nilai FROM nilai_mapel 
                                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                        WHERE nilai_mapel.id_siswa = " . $row['id_siswa'] .
                                        " AND mapel.id_mapel = " . $mapel['id_mapel'] .
                                        " AND mapel.id_periode = " . $periode['id_periode'] .
                                        " AND nilai_mapel.ket_nilai = 'UTS'";
                                    $nilai_uts = QueryOnedata($sql_nilai_uts);
                                    if ($nilai_uts->num_rows > 0) {
                                        echo $nilai_uts->fetch_assoc()['nilai'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sql_nilai_uas = "SELECT COALESCE(nilai_mapel.nilai, '-') as nilai FROM nilai_mapel 
                                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                        WHERE nilai_mapel.id_siswa = " . $row['id_siswa'] .
                                        " AND mapel.id_mapel = " . $mapel['id_mapel'] .
                                        " AND mapel.id_periode = " . $periode['id_periode'] .
                                        " AND nilai_mapel.ket_nilai = 'UAS'";
                                    $nilai_uas = QueryOnedata($sql_nilai_uas);
                                    if ($nilai_uas->num_rows > 0) {
                                        echo $nilai_uas->fetch_assoc()['nilai'];
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <thead>
                        <?php
                        // UH1
                        $sql_nilai_uh1r = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                        WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                            " AND mapel.id_periode = " . $periode['id_periode'] .
                            " AND nilai_mapel.ket_nilai = 'UH1'";
                        $nilai_uh1r = QueryOnedata($sql_nilai_uh1r);
                        // UH2
                        $sql_nilai_uh2r = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                        WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                            " AND mapel.id_periode = " . $periode['id_periode'] .
                            " AND nilai_mapel.ket_nilai = 'UH2'";
                        $nilai_uh2r = QueryOnedata($sql_nilai_uh2r);
                        // UH3
                        $sql_nilai_uh3r = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                        WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                            " AND mapel.id_periode = " . $periode['id_periode'] .
                            " AND nilai_mapel.ket_nilai = 'UH3'";
                        $nilai_uh3r = QueryOnedata($sql_nilai_uh3r);
                        // UH4
                        $sql_nilai_uh4r = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                        WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                            " AND mapel.id_periode = " . $periode['id_periode'] .
                            " AND nilai_mapel.ket_nilai = 'UH4'";
                        $nilai_uh4r = QueryOnedata($sql_nilai_uh4r);
                        // UTS
                        $sql_nilai_utsr = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                        LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                        LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                        WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                            " AND mapel.id_periode = " . $periode['id_periode'] .
                            " AND nilai_mapel.ket_nilai = 'UTS'";
                        $nilai_utsr = QueryOnedata($sql_nilai_utsr);
                        // UAS
                        $sql_nilai_uasR = "SELECT AVG(nilai_mapel.nilai) as nilai FROM nilai_mapel 
                                LEFT JOIN jadwal_siswa ON jadwal_siswa.id_jadwal_siswa = nilai_mapel.id_jadwal
                                LEFT JOIN mapel ON mapel.id_mapel = jadwal_siswa.id_mapel
                                WHERE mapel.id_mapel = " . $mapel['id_mapel'] .
                            " AND mapel.id_periode = " . $periode['id_periode'] .
                            " AND nilai_mapel.ket_nilai = 'UAS'";
                        $nilai_uasr = QueryOnedata($sql_nilai_uasR);
                        $total = 0;
                        ?>
                        <tr>
                            <td></td>
                            <td colspan="2">Rata-Rata</td>
                            <td>
                            <?php
                                if ($nilai_uh1r->num_rows > 0) {                                    
                                    $row1 = $nilai_uh1r->fetch_assoc();
                                    echo $row1['nilai'];                                        
                                    $float = (float)$row1['nilai'];
                                    $total = $total + $float;                                       
                                }
                                ?>
                            </td>
                            <td>
                            <?php
                                if ($nilai_uh2r->num_rows > 0) {
                                    $row2 = $nilai_uh2r->fetch_assoc();
                                    echo $row2['nilai'];                                        
                                    $float = (float)$row2['nilai'];
                                    $total = $total + $float;   
                                }
                                ?>
                            </td>
                            <td>
                            <?php
                                if ($nilai_uh3r->num_rows > 0) {
                                    $row3 = $nilai_uh3r->fetch_assoc();
                                    echo $row3['nilai'];                                        
                                    $float = (float)$row3['nilai'];
                                    $total = $total + $float; 
                                }
                                ?>
                            </td>
                            <td>
                            <?php
                                if ($nilai_uh4r->num_rows > 0) {
                                    $row4 = $nilai_uh4r->fetch_assoc();
                                    echo $row4['nilai'];                                        
                                    $float = (float)$row4['nilai'];
                                    $total = $total + $float; 
                                }
                                ?>
                            </td>
                            <td>
                            <?php
                                if ($nilai_utsr->num_rows > 0) {
                                    $row5 = $nilai_utsr->fetch_assoc();
                                    echo $row5['nilai'];                                        
                                    $float = (float)$row5['nilai'];
                                    $total = $total + $float;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($nilai_uasr->num_rows > 0) {
                                    $row6 = $nilai_uasr->fetch_assoc();
                                    echo $row6['nilai'];                                        
                                    $float = (float)$row6['nilai'];
                                    $total = $total + $float;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">Rata-Rata Standard</td>
                            
                            <td>
                                <?php 
                                    echo ($total /6);
                                ?>
                            </td>
                            <td>
                            
                            </td>
                            <td>
                            
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include_once './template/footer.php'; ?>