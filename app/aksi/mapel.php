<?php
include '../../config.php';
session_start();

if(isset($_POST['simpanmapel'])){
        // Data yang ingin Execution
        $data = [
            "id_periode" => $_POST['id_periode'],
            "nm_mapel" => $_POST['nm_mapel'],
        ];    
        // Insert satu data
        $process = InsertOnedata("mapel", $data);
        $_SESSION['message'] = "Data Mapel ".$process['message'];
        header("Location: ".$url."/app/mapel.php");
        exit(); 
}elseif(isset($_POST['updatemapel'])){
        // Data yang ingin Execution
        $data = [
            "id_periode" => $_POST['id_periode'],
            "nm_mapel" => $_POST['nm_mapel'],
        ];      
        // Update data berdasarkan
        $process = UpdateOneData("mapel", $data, " WHERE id_mapel = ".$_POST['id_mapel']."");
        $_SESSION['message'] = "Data Mapel ".$process['message'];
        header("Location: ".$url."/app/mapel.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("mapel", "WHERE id_mapel = ".$_GET['id_mapel']."");
    $_SESSION['message'] = "Data Mapel ".$process['message'];
    header("Location: ".$url."/app/mapel.php");
    exit(); 
}