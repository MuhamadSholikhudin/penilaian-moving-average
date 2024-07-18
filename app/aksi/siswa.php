<?php
include '../../config.php';
session_start();

if(isset($_POST['simpansiswa'])){
        // Data yang ingin Execution
        $data = [
            "nis" => $_POST['nis'],
            "nm_siswa" => $_POST['nm_siswa'],
            "id_kelas" => $_POST['id_kelas'],
            "alamat_siswa" => $_POST['alamat_siswa'],
            "jk_siswa" => $_POST['jk_siswa'],
            "tgl_lahir_siswa" => $_POST['tgl_lahir_siswa'],
            "no_hp" => $_POST['no_hp'],
            "nm_wali" => $_POST['nm_wali'],
            "status_siswa" => $_POST['status_siswa'],
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
            "nm_siswa" => $_POST['nm_siswa'],
            "id_kelas" => $_POST['id_kelas'],
            "alamat_siswa" => $_POST['alamat_siswa'],
            "jk_siswa" => $_POST['jk_siswa'],
            "tgl_lahir_siswa" => $_POST['tgl_lahir_siswa'],
            "no_hp" => $_POST['no_hp'],
            "nm_wali" => $_POST['nm_wali'],
            "status_siswa" => $_POST['status_siswa'],
        ];  
        // Update data berdasarkan
        $process = UpdateOneData("siswa", $data, " WHERE id_siswa = ".$_POST['id_siswa']."");
        $_SESSION['message'] = "Data Alat Berat ".$process['message'];
        header("Location: ".$url."/app/siswa.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("siswa", "WHERE id_siswa = ".$_GET['id_siswa']."");
    $_SESSION['message'] = "Data Alat Berat ".$process['message'];
    header("Location: ".$url."/app/siswa.php");
    exit(); 
}