<?php
include '../config/config.php';
session_start();

if(isset($_POST['simpankelas'])){
        // Data yang ingin Execution
        $data = [
            "nm_kelas" => $_POST['nm_kelas'],
            "kelas" => $_POST['kelas'],
        ];    
        // Insert satu data
        $process = InsertOnedata("kelas", $data);
        $_SESSION['message'] = "<strong>Success !</strong> Data Kelas ".$process['message'];
        header("Location: ".$url."/app/kelas/kelas.php");
        exit(); 
}elseif(isset($_POST['updatekelas'])){
        // Data yang ingin Execution
        $data = [
            "nm_kelas" => $_POST['nm_kelas'],
            "kelas" => $_POST['kelas'],
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("kelas", $data, " WHERE id_kelas = ".$_POST['id_kelas']."");
        $_SESSION['message'] = "<strong>Success !</strong> Data Kelas ".$process['message'];
        header("Location: ".$url."/app/kelas/kelas.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $check_siswa = QueryOnedata("SELECT * FROM siswa WHERE id_kelas = ".$_GET['id_kelas']."");
    if($check_siswa->num_rows > 0){
        $_SESSION['message'] = "<strong>Gagal !</strong> Data Kelas tidak dapat di hapus karena masih di pakai pada siswa";
        header("Location: ".$url."/app/kelas/kelas.php");
        exit(); 
    }
    $process = DeleteOneData("kelas", "WHERE id_kelas = ".$_GET['id_kelas']."");
    $_SESSION['message'] = "<strong>Success !</strong> Data Kelas ".$process['message'];
    header("Location: ".$url."/app/kelas/kelas.php");
    exit(); 
}