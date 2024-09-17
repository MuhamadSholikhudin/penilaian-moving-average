<?php
include '../config/config.php';
session_start();

if(isset($_POST['simpannilai_ekstra'])){
        // Data yang ingin Execution
        $data = [
            "id_siswa" => $_POST['id_siswa'],
            "id_ekstra_siswa" => $_POST['id_ekstra_siswa'],
            "nilai" => $_POST['nilai'],
            "ket_nilai" => $_POST['ket_nilai'],
        ];    
        // Insert satu data
        $process = InsertOnedata("nilai_ekstra", $data);
        $_SESSION['message'] = "Data Kelas ".$process['message'];
        header("Location: ".$url."/app/nilai_ekstra/nilai_ekstra.php");
        exit(); 
}elseif(isset($_POST['updatenilai_ekstra'])){
        // Data yang ingin Execution
        $data = [
            "id_siswa" => $_POST['id_siswa'],
            "id_ekstra_siswa" => $_POST['id_ekstra_siswa'],
            "nilai" => $_POST['nilai'],
            "ket_nilai" => $_POST['ket_nilai'],
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("nilai_ekstra", $data, " WHERE id_nilai_ekstra = ".$_POST['id_nilai_ekstra']."");
        $_SESSION['message'] = "Data Kelas ".$process['message'];
        header("Location: ".$url."/app/nilai_ekstra/nilai_ekstra.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("nilai_ekstra", "WHERE id_nilai_ekstra = ".$_GET['id_nilai_ekstra']."");
    $_SESSION['message'] = "Data Kelas ".$process['message'];
    header("Location: ".$url."/app/nilai_ekstra/nilai_ekstra.php");
    exit(); 
}