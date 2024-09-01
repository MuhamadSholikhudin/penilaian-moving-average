<?php
include '../../config.php';
session_start();

if (isset($_POST['simpanekstra_siswa'])) {
    // Data yang ingin Execution
    $data = [
        "id_siswa" => $_POST['id_siswa'],
        "id_ekstra" => $_POST['id_ekstra'],
    ];
    // Insert satu data
    $process = InsertOnedata("ekstra_siswa", $data);
    $_SESSION['message'] = "Data Jadwal Siswa " . $process['message'];
    header("Location: " . $url . "/app/ekstra_siswa.php");
    exit();
} elseif (isset($_POST['updateekstra_siswa'])) {
    // Data yang ingin Execution
    $data = [
        "id_siswa" => $_POST['id_siswa'],
        "id_ekstra" => $_POST['id_ekstra'],
    ];
       
    // Update data berdasarkan
    $process = UpdateOneData("ekstra_siswa", $data, " WHERE id_ekstra_siswa = " . $_POST['id_ekstra_siswa'] . "");
    $_SESSION['message'] = "Data Ekstra Siswa " . $process['message'];
    header("Location: " . $url . "/app/ekstra_siswa.php");
    exit();
} elseif ($_GET['action'] == 'delete') {
    $process = DeleteOneData("ekstra_siswa", "WHERE id_ekstra_siswa = " . $_GET['id_ekstra_siswa'] . "");
    $_SESSION['message'] = "Data Ekstra Siswa " . $process['message'];
    header("Location: " . $url . "/app/ekstra_siswa.php");
    exit();
}
