<?php
include '../../config.php';
session_start();

if(isset($_POST['simpanpresensi'])){
        // Data yang ingin Execution
        $data = [
            "nis" => $_POST['nis'],
            "nilai_presensi" => $_POST['nilai_presensi'],
            "semester" => $_POST['semester'],
            "ket_presensi" => $_POST['ket_presensi']
        ];    
        // Insert satu data
        $process = InsertOnedata("presensi", $data);
        $_SESSION['message'] = "Data Perawatan ".$process['message'];
        header("Location: ".$url."/app/presensi.php");
        exit(); 
}elseif(isset($_POST['updatepresensi'])){
        // Data yang ingin Execution
        $data = [
            "nis" => $_POST['nis'],
            "nilai_presensi" => $_POST['nilai_presensi'],
            "semester" => $_POST['semester'],
            "ket_presensi" => $_POST['ket_presensi']
        ];      
        // Update data berdasarkan
        $process = UpdateOneData("presensi", $data, " WHERE id_presensi = ".$_POST['id_presensi']."");
        $_SESSION['message'] = "Data Perawatan ".$process['message'];
        header("Location: ".$url."/app/presensi.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("presensi", "WHERE id_presensi = ".$_GET['id_presensi']."");
    $_SESSION['message'] = "Data Perawatan ".$process['message'];
    header("Location: ".$url."/app/presensi.php");
    exit(); 
}