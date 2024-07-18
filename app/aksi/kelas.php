<?php
include '../../config.php';
session_start();

if(isset($_POST['simpankelas'])){
        // Data yang ingin Execution
        $data = [
            "nm_kelas" => $_POST['nm_kelas'],
            "kelas" => $_POST['kelas'],
        ];    
        // Insert satu data
        $process = InsertOnedata("kelas", $data);
        $_SESSION['message'] = "Data Kelas ".$process['message'];
        header("Location: ".$url."/app/kelas.php");
        exit(); 
}elseif(isset($_POST['updatekelas'])){
        // Data yang ingin Execution
        $data = [
            "nm_kelas" => $_POST['nm_kelas'],
            "kelas" => $_POST['kelas'],
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("kelas", $data, " WHERE id_kelas = ".$_POST['id_kelas']."");
        $_SESSION['message'] = "Data Kelas ".$process['message'];
        header("Location: ".$url."/app/kelas.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("kelas", "WHERE id_kelas = ".$_GET['id_kelas']."");
    $_SESSION['message'] = "Data Kelas ".$process['message'];
    header("Location: ".$url."/app/kelas.php");
    exit(); 
}