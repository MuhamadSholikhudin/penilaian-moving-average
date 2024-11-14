<?php
include '../config/config.php';
session_start();

if (isset($_POST['simpanekstra'])) {
    // Data yang ingin Execution
    $data = [
        "id_periode" => $_POST['id_periode'],
        "nm_ekstra" => $_POST['nm_ekstra'],
        "penanggung_jawab" => $_POST['penanggung_jawab']
    ];
    // Insert satu data
    $process = InsertOnedata("ekstra", $data);
    $_SESSION['message'] = "<strong>Success !</strong> Data Ekstra " . $process['message'];
    header("Location: " . $url . "/app/ekstra/ekstra.php");
    exit();
} elseif (isset($_POST['updateekstra'])) {
    // Data yang ingin Execution
    $data = [
        "id_periode" => $_POST['id_periode'],
        "nm_ekstra" => $_POST['nm_ekstra'],
        "penanggung_jawab" => $_POST['penanggung_jawab']
    ];
    // Update data berdasarkan
    $process = UpdateOneData("ekstra", $data, " WHERE id_ekstra = " . $_POST['id_ekstra'] . "");
    $_SESSION['message'] = "<strong>Success !</strong> Data Ekstra " . $process['message'];
    header("Location: " . $url . "/app/ekstra/ekstra.php");
    exit();
} elseif ($_GET['action'] == 'delete') {
    $check_ekstra = QueryOnedata("SELECT * FROM ekstra WHERE id_ekstra = ".$_GET['id_ekstra']."");
    if($check_ekstra->num_rows > 0){
        $_SESSION['message'] = "<strong>Gagal !</strong> Data Ekstra tidak dapat di hapus karena masih di pakai pada ekstra siswa";
        header("Location: ".$url."/app/ekstra/ekstra.php");
        exit(); 
    }
    $process = DeleteOneData("ekstra", "WHERE id_ekstra = " . $_GET['id_ekstra'] . "");
    $_SESSION['message'] = "<strong>Success !</strong> Data Ekstra " . $process['message'];
    header("Location: " . $url . "/app/ekstra/ekstra.php");
    exit();
}
