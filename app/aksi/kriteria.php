<?php
include '../../config.php';
session_start();

if(isset($_POST['simpankriteria'])){
        // Data yang ingin Execution
        $data = [
            "nama_kriteria" => $_POST['nama_kriteria'],
            "deskripsi" => $_POST['deskripsi'],
        ];    
        // Insert satu data
        $process = InsertOnedata("kriteria", $data);
        $_SESSION['message'] = "Data Kriteria ".$process['message'];
        header("Location: ".$url."/app/kriteria.php");
        exit(); 
}elseif(isset($_POST['updatekriteria'])){
        // Data yang ingin Execution
        $data = [
            "nama_kriteria" => $_POST['nama_kriteria'],
            "deskripsi" => $_POST['deskripsi'],
        ];     
        // Update data berdasarkan
        $process = UpdateOneData("kriteria", $data, " WHERE id_kriteria = ".$_POST['id_kriteria']."");
        $_SESSION['message'] = "Data Kriteria ".$process['message'];
        header("Location: ".$url."/app/kriteria.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("kriteria", "WHERE id_kriteria = ".$_GET['id_kriteria']."");
    $_SESSION['message'] = "Data Kriteria ".$process['message'];
    header("Location: ".$url."/app/kriteria.php");
    exit(); 
}