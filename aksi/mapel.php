<?php
include '../config/config.php';
session_start();

if(isset($_POST['simpanmapel'])){
        // Data yang ingin Execution
        $data = [
            "id_periode" => $_POST['id_periode'],
            "nm_mapel" => $_POST['nm_mapel'],
        ];    
        // Insert satu data
        $process = InsertOnedata("mapel", $data);
        $_SESSION['message'] = "<strong>Success !</strong> Data Mapel ".$process['message'];
        header("Location: ".$url."/app/mapel/mapel.php");
        exit(); 
}elseif(isset($_POST['updatemapel'])){
        // Data yang ingin Execution
        $data = [
            "id_periode" => $_POST['id_periode'],
            "nm_mapel" => $_POST['nm_mapel'],
        ];      
        // Update data berdasarkan
        $process = UpdateOneData("mapel", $data, " WHERE id_mapel = ".$_POST['id_mapel']."");
        $_SESSION['message'] = "<strong>Success !</strong>  Data Mapel ".$process['message'];
        header("Location: ".$url."/app/mapel/mapel.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $check_jadwal_siswa = QueryOnedata("SELECT * FROM jadwal_siswa WHERE id_mapel = ".$_GET['id_mapel']."");
    if($check_jadwal_siswa->num_rows > 0){
        $_SESSION['message'] = "<strong>Gagal !</strong> Data Mapel tidak dapat di hapus karena masih di pakai pada jadwal siswa";
        header("Location: ".$url."/app/mapel/mapel.php");
        exit(); 
    }
    $process = DeleteOneData("mapel", "WHERE id_mapel = ".$_GET['id_mapel']."");
    $_SESSION['message'] = "Data Mapel ".$process['message'];
    header("Location: ".$url."/app/mapel/mapel.php");
    exit(); 
}