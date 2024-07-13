<?php
include '../../config.php';
session_start();

if(isset($_POST['simpanmapel'])){
        // Data yang ingin Execution
        $data = [
            "nama_pelajaran" => $_POST['nama_pelajaran'],
            "kode_pelajaran" => $_POST['kode_pelajaran'],
        ];    
        // Insert satu data
        $process = InsertOnedata("mapel", $data);
        $_SESSION['message'] = "Data Perawatan ".$process['message'];
        header("Location: ".$url."/app/mapel.php");
        exit(); 
}elseif(isset($_POST['updatemapel'])){
        // Data yang ingin Execution
        $data = [
            "nama_pelajaran" => $_POST['nama_pelajaran'],
            "kode_pelajaran" => $_POST['kode_pelajaran'],
        ];      
        // Update data berdasarkan
        $process = UpdateOneData("mapel", $data, " WHERE id_mapel = ".$_POST['id_mapel']."");
        $_SESSION['message'] = "Data Perawatan ".$process['message'];
        header("Location: ".$url."/app/mapel.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("mapel", "WHERE id_mapel = ".$_GET['id_mapel']."");
    $_SESSION['message'] = "Data Perawatan ".$process['message'];
    header("Location: ".$url."/app/mapel.php");
    exit(); 
}