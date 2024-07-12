<?php
include '../../config.php';
session_start();

if(isset($_POST['simpansiswa'])){
        // Data yang ingin Execution
        $data = [
            "nis" => $_POST['nis'],
            "nama_siswa" => $_POST['nama_siswa'],
            "tgl_lahir" => $_POST['tgl_lahir'],
            "kelamin" => $_POST['kelamin'],
            "agama" => $_POST['agama'],
            "kelas" => $_POST['kelas'],
            "kelas_kategori" => $_POST['kelas_kategori']
        ];    
        // Insert satu data
        $process = InsertOnedata("siswa", $data);
        $_SESSION['message'] = "Data Siswa ".$process['message'];
        header("Location: ".$url."/app/siswa.php");
        exit(); 
}elseif(isset($_POST['updatesiswa'])){
        // Data yang ingin Execution
        $data = [
            "nis" => $_POST['nis'],
            "nama_siswa" => $_POST['nama_siswa'],
            "tgl_lahir" => $_POST['tgl_lahir'],
            "kelamin" => $_POST['kelamin'],
            "agama" => $_POST['agama'],
            "kelas" => $_POST['kelas'],
            "kelas_kategori" => $_POST['kelas_kategori']
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("siswa", $data, " WHERE nis = ".$_POST['nis']."");
        $_SESSION['message'] = "Data Alat Berat ".$process['message'];
        header("Location: ".$url."/app/siswa.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("siswa", "WHERE nis = ".$_GET['nis']."");
    $_SESSION['message'] = "Data Alat Berat ".$process['message'];
    header("Location: ".$url."/app/siswa.php");
    exit(); 
}