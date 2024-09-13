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
    $_SESSION['message'] = "Data Jadwal Siswa " . $process['message'];
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
    $_SESSION['message'] = "Data Jadwal Siswa " . $process['message'];
    header("Location: " . $url . "/app/jadwal_siswa/jadwal_siswa.php");
    exit();
} elseif ($_GET['action'] == 'delete') {
    $process = DeleteOneData("jadwal_siswa", "WHERE id_jadwal_siswa = " . $_GET['id_jadwal_siswa'] . "");
    $_SESSION['message'] = "Data Jadwal Siswa " . $process['message'];
    header("Location: " . $url . "/app/jadwal_siswa/jadwal_siswa.php");
    exit();
}
