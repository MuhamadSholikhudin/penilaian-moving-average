<?php
include '../../config.php';
session_start();

if(isset($_POST['simpankomponen'])){
        // Data yang ingin Execution
        $data = [
            "id_alat_berat" => $_POST['id_alat_berat'],
            "nama_komponen" => $_POST['nama_komponen'],
            "tipe_komponen" => $_POST['tipe_komponen'],
            "deskripsi" => $_POST['deskripsi'],
            "tahun_pembuatan" => $_POST['tahun_pembuatan'],
        ];    
        // Insert satu data
        $process = InsertOnedata("komponen", $data);
        $_SESSION['message'] = "Data Perawatan ".$process['message'];
        header("Location: ".$url."/app/komponen.php");
        exit(); 
}elseif(isset($_POST['updatekomponen'])){
        // Data yang ingin Execution
        $data = [
            "id_alat_berat" => $_POST['id_alat_berat'],
            "nama_komponen" => $_POST['nama_komponen'],
            "tipe_komponen" => $_POST['tipe_komponen'],
            "deskripsi" => $_POST['deskripsi'],
            "tahun_pembuatan" => $_POST['tahun_pembuatan'],
        ];      
        // Update data berdasarkan
        $process = UpdateOneData("komponen", $data, " WHERE id_komponen = ".$_POST['id_komponen']."");
        $_SESSION['message'] = "Data Perawatan ".$process['message'];
        header("Location: ".$url."/app/komponen.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("komponen", "WHERE id_komponen = ".$_GET['id_komponen']."");
    $_SESSION['message'] = "Data Perawatan ".$process['message'];
    header("Location: ".$url."/app/komponen.php");
    exit(); 
}