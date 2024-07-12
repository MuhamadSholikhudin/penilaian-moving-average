<?php
include '../../config.php';
session_start();

if(isset($_POST['simpanperawatan'])){
        // Data yang ingin Execution
        $data = [
            "id_alat_berat" => $_POST['id_alat_berat'],
            "id_pengguna" => $_POST['id_pengguna'],
            "tanggal_perawatan" => $_POST['tanggal_perawatan'],
            "jenis_perawatan" => $_POST['jenis_perawatan'],
            "keterangan" => $_POST['keterangan'],
            "biaya_perawatan" => $_POST['biaya_perawatan'],
        ];    
        // Insert satu data
        $process = InsertOnedata("perawatan", $data);
        $_SESSION['message'] = "Data Perawatan ".$process['message'];
        header("Location: ".$url."/app/perawatan.php");
        exit(); 
}elseif(isset($_POST['updateperawatan'])){
        // Data yang ingin Execution
        $data = [
            "id_alat_berat" => $_POST['id_alat_berat'],
            "id_pengguna" => $_POST['id_pengguna'],
            "tanggal_perawatan" => $_POST['tanggal_perawatan'],
            "jenis_perawatan" => $_POST['jenis_perawatan'],
            "keterangan" => $_POST['keterangan'],
            "biaya_perawatan" => $_POST['biaya_perawatan'],
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("perawatan", $data, " WHERE id_perawatan = ".$_POST['id_perawatan']."");
        $_SESSION['message'] = "Data Perawatan ".$process['message'];
        header("Location: ".$url."/app/perawatan.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("perawatan", "WHERE id_perawatan = ".$_GET['id_perawatan']."");
    $_SESSION['message'] = "Data Perawatan ".$process['message'];
    header("Location: ".$url."/app/perawatan.php");
    exit(); 
}