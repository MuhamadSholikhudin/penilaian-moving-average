<?php
include '../../config.php';
session_start();

if(isset($_POST['simpansub_kriteria'])){
        // Data yang ingin Execution
        $data = [
            "id_kriteria" => $_POST['id_kriteria'],
            "sub_kriteria" => $_POST['sub_kriteria'],
            "deskripsi" => $_POST['deskripsi'],
        ];    
        // Insert satu data
        $process = InsertOnedata("sub_kriteria", $data);
        $_SESSION['message'] = "Data Sub Kriteria ".$process['message'];
        header("Location: ".$url."/app/sub_kriteria.php");
        exit(); 
}elseif(isset($_POST['updatesub_kriteria'])){
        // Data yang ingin Execution
        $data = [
            "id_kriteria" => $_POST['id_kriteria'],
            "sub_kriteria" => $_POST['sub_kriteria'],
            "deskripsi" => $_POST['deskripsi'],
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("sub_kriteria", $data, " WHERE id_sub_kriteria = ".$_POST['id_sub_kriteria']."");
        $_SESSION['message'] = "Data Sub Kriteria ".$process['message'];
        header("Location: ".$url."/app/sub_kriteria.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("sub_kriteria", "WHERE id_sub_kriteria = ".$_GET['id_sub_kriteria']."");
    $_SESSION['message'] = "Data Sub Kriteria ".$process['message'];
    header("Location: ".$url."/app/sub_kriteria.php");
    exit(); 
}