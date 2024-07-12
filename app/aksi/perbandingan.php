<?php
include '../../config.php';
session_start();

if(isset($_POST['simpanperbandingan'])){
        // Data yang ingin Execution
        $data = [
            "sub_kriteria1" => $_POST['sub_kriteria1'],
            "sub_kriteria2" => $_POST['sub_kriteria2'],
            "nilai" => $_POST['nilai'],
        ];    
        // Insert satu data
        $process = InsertOnedata("perbandingan", $data);
        $_SESSION['message'] = "Data Perbandingan ".$process['message'];
        header("Location: ".$url."/app/perbandingan.php");
        exit(); 
}elseif(isset($_POST['updateperbandingan'])){
        // Data yang ingin Execution
        $data = [
            "sub_kriteria1" => $_POST['sub_kriteria1'],
            "sub_kriteria2" => $_POST['sub_kriteria2'],
            "nilai" => $_POST['nilai'],
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("perbandingan", $data, " WHERE id_perbandingan = ".$_POST['id_perbandingan']."");
        $_SESSION['message'] = "Data Perbandingan ".$process['message'];
        header("Location: ".$url."/app/perbandingan.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("perbandingan", "WHERE id_perbandingan = ".$_GET['id_perbandingan']."");
    $_SESSION['message'] = "Data Perbandingan ".$process['message'];
    header("Location: ".$url."/app/perbandingan.php");
    exit(); 
}