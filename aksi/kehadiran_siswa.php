<?php
include '../config/config.php';
session_start();

if (isset($_POST['simpankehadiran_siswa'])) {
    // Data yang ingin Execution
    $data = [
        "id_siswa" => $_POST["id_siswa"],
        "tgl_masuk" => $_POST["tgl_masuk"],
        "jam_masuk" => $_POST["jam_masuk"],
        "jam_pulang" => $_POST["jam_pulang"],
        "status" => $_POST["status"],
        "keterangan" => $_POST["keterangan"],
    ]; 
    // Insert satu data
    $process = InsertOnedata("kehadiran_siswa", $data);
    $_SESSION['message'] = "Data Kehadiran Siswa " . $process['message'];
    header("Location: " . $url . "/app/kehadiran_siswa/kehadiran_siswa.php");
    exit();
} elseif (isset($_POST['updatekehadiran_siswa'])) {
    // Data yang ingin Execution
    $data = [
        "id_siswa" => $_POST["id_siswa"],
        "tgl_masuk" => $_POST["tgl_masuk"],
        "jam_masuk" => $_POST["jam_masuk"],
        "jam_pulang" => $_POST["jam_pulang"],
        "status" => $_POST["status"],
        "keterangan" => $_POST["keterangan"],
    ]; 
       
    // Update data berdasarkan
    $process = UpdateOneData("kehadiran_siswa", $data, " WHERE id_kehadiran = " . $_POST['id_kehadiran'] . "");
    $_SESSION['message'] = "Data Kehadiran Siswa " . $process['message'];
    header("Location: " . $url . "/app/kehadiran_siswa/kehadiran_siswa.php");
    exit();
} elseif ($_GET['action'] == 'delete') {
    $process = DeleteOneData("kehadiran_siswa", "WHERE id_kehadiran = " . $_GET['id_kehadiran'] . "");
    $_SESSION['message'] = "Data Kehadiran Siswa " . $process['message'];
    header("Location: " . $url . "/app/kehadiran_siswa/kehadiran_siswa.php");
    exit();
}
