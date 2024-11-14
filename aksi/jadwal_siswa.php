<?php
include '../config/config.php';
session_start();

if (isset($_POST['simpanjadwal_siswa'])) {
    // Data yang ingin Execution
    $data = [
        "id_siswa" => $_POST['id_siswa'],
        "id_mapel" => $_POST['id_mapel'],
        "id_guru" => $_POST['id_guru'],
        "id_kelas" => $_POST['id_kelas'],
        "hari" => $_POST['hari'],
        "waktu_awal" => $_POST['waktu_awal'],
        "waktu_akhir" => $_POST['waktu_akhir'],
    ];
    // Insert satu data
    $process = InsertOnedata("jadwal_siswa", $data);
    $_SESSION['message'] = "<strong>Success !</strong> Data Jadwal Siswa " . $process['message'];
    header("Location: " . $url . "/app/jadwal_siswa/jadwal_siswa.php");
    exit();
} elseif (isset($_POST['updatejadwal_siswa'])) {
    // Data yang ingin Execution
    $data = [
        "id_siswa" => $_POST['id_siswa'],
        "id_mapel" => $_POST['id_mapel'],
        "id_guru" => $_POST['id_guru'],
        "id_kelas" => $_POST['id_kelas'],
        "hari" => $_POST['hari'],
        "waktu_akhir" => $_POST['waktu_awal'],
        "waktu_akhir" => $_POST['waktu_awal'],
    ];
       
    // Update data berdasarkan
    $process = UpdateOneData("jadwal_siswa", $data, " WHERE id_jadwal_siswa = " . $_POST['id_jadwal_siswa'] . "");
    $_SESSION['message'] = "<strong>Success !</strong> Data Jadwal Siswa " . $process['message'];
    header("Location: " . $url . "/app/jadwal_siswa/jadwal_siswa.php");
    exit();
} elseif ($_GET['action'] == 'delete') {
    $check_jadwal_siswa = QueryOnedata("SELECT * FROM jadwal_siswa WHERE id_mapel = ".$_GET['id_mapel']."");
    if($check_jadwal_siswa->num_rows > 0){
        $_SESSION['message'] = "<strong>Gagal !</strong> Data Jadwal Siswa tidak dapat di hapus karena masih di pakai pada Nilai mapel";
        header("Location: ".$url."/app/jadwal_siswa/jadwal_siswa.php");
        exit(); 
    }

    $process = DeleteOneData("jadwal_siswa", "WHERE id_jadwal_siswa = " . $_GET['id_jadwal_siswa'] . "");
    $_SESSION['message'] = "<strong>Success !</strong> Data Jadwal Siswa " . $process['message'];
    header("Location: " . $url . "/app/jadwal_siswa/jadwal_siswa.php");
    exit();
}
