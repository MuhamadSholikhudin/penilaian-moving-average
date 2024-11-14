<?php
include '../config/config.php';
session_start();

if (isset($_POST['simpanekstra_siswa'])) {
    // Data yang ingin Execution
    $data = [
        "id_siswa" => $_POST['id_siswa'],
        "id_ekstra" => $_POST['id_ekstra'],
    ];
    // Insert satu data
    $process = InsertOnedata("ekstra_siswa", $data);
    $_SESSION['message'] = "<strong>Success !</strong> Data Jadwal Siswa " . $process['message'];
    header("Location: " . $url . "/app/ekstra_siswa/ekstra_siswa.php");
    exit();
} elseif (isset($_POST['updateekstra_siswa'])) {
    // Data yang ingin Execution
    $data = [
        "id_siswa" => $_POST['id_siswa'],
        "id_ekstra" => $_POST['id_ekstra'],
    ];
       
    // Update data berdasarkan
    $process = UpdateOneData("ekstra_siswa", $data, " WHERE id_ekstra_siswa = " . $_POST['id_ekstra_siswa'] . "");
    $_SESSION['message'] = "<strong>Success !</strong> Data Ekstra Siswa " . $process['message'];
    header("Location: " . $url . "/app/ekstra_siswa/ekstra_siswa.php");
    exit();
} elseif ($_GET['action'] == 'delete') {

    $check_nilai_ekstra = QueryOnedata("SELECT * FROM nilai_ekstra WHERE id_ekstra_siswa = ".$_GET['id_ekstra_siswa']."");
    if($check_nilai_ekstra->num_rows > 0){
        $_SESSION['message'] = "<strong>Gagal !</strong> Data Ekstra Siswa tidak dapat di hapus karena masih di pakai pada nilai ekstra";
        header("Location: ".$url."/app/ekstra_siswa/ekstra_siswa.php");
        exit(); 
    }
    $process = DeleteOneData("ekstra_siswa", "WHERE id_ekstra_siswa = " . $_GET['id_ekstra_siswa'] . "");
    $_SESSION['message'] = "<strong>Success !</strong> Data Ekstra Siswa " . $process['message'];
    header("Location: " . $url . "/app/ekstra_siswa/ekstra_siswa.php");
    exit();
}
