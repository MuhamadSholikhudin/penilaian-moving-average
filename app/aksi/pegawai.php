<?php
include '../../config.php';
session_start();

if(isset($_POST['simpanpegawai'])){
        // Data yang ingin Execution
        $data = [
            "nip" => $_POST['nip'],
            "nama_pegawai" => $_POST['nama_pegawai'],
            "jabatan" => $_POST['jabatan'],
            "pendidikan" => $_POST['pendidikan']
        ];    
        // Insert satu data
        $process = InsertOnedata("pegawai", $data);
        $_SESSION['message'] = "Data Pegawai ".$process['message'];
        header("Location: ".$url."/app/pegawai.php");
        exit(); 
}elseif(isset($_POST['updatepegawai'])){
        // Data yang ingin Execution
        $data = [
            "nip" => $_POST['nip'],
            "nama_pegawai" => $_POST['nama_pegawai'],
            "jabatan" => $_POST['jabatan'],
            "pendidikan" => $_POST['pendidikan']
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("pegawai", $data, " WHERE nip = ".$_POST['nip']."");
        $_SESSION['message'] = "Data Pegawai ".$process['message'];
        header("Location: ".$url."/app/pegawai.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("pegawai", "WHERE nip = ".$_GET['nip']."");
    $_SESSION['message'] = "Data Pegawai ".$process['message'];
    header("Location: ".$url."/app/pegawai.php");
    exit(); 
}