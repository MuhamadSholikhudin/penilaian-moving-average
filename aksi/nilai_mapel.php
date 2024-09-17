<?php
include '../config/config.php';
session_start();

if(isset($_POST['simpannilai_mapel'])){
        // Data yang ingin Execution
        $data = [
            "id_siswa" => $_POST['id_siswa'],
            "id_jadwal" => $_POST['id_jadwal'],
            "nilai" => $_POST['nilai'],
            "ket_nilai" => $_POST['ket_nilai'],
        ];    
        // Insert satu data
        $process = InsertOnedata("nilai_mapel", $data);
        $_SESSION['message'] = "Data Kelas ".$process['message'];
        header("Location: ".$url."/app/nilai_mapel/nilai_mapel.php");
        exit(); 
}elseif(isset($_POST['updatenilai_mapel'])){
        // Data yang ingin Execution
        $data = [
            "id_siswa" => $_POST['id_siswa'],
            "id_jadwal" => $_POST['id_jadwal'],
            "nilai" => $_POST['nilai'],
            "ket_nilai" => $_POST['ket_nilai'],
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("nilai_mapel", $data, " WHERE id_nilai_mapel = ".$_POST['id_nilai_mapel']."");
        $_SESSION['message'] = "Data Kelas ".$process['message'];
        header("Location: ".$url."/app/nilai_mapel/nilai_mapel.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("nilai_mapel", "WHERE id_nilai_mapel = ".$_GET['id_nilai_mapel']."");
    $_SESSION['message'] = "Data Kelas ".$process['message'];
    header("Location: ".$url."/app/nilai_mapel/nilai_mapel.php");
    exit(); 
}