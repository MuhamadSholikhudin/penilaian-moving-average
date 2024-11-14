<?php
include '../config/config.php';
session_start();

if(isset($_POST['simpanperiode'])){
        // Data yang ingin Execution
        $data = [
            "nm_periode" => $_POST['nm_periode'],
            "status_periode" => $_POST['status_periode'],
        ];    
        // Insert satu data
        $process = InsertOnedata("periode", $data);
        $_SESSION['message'] = "<strong>Success !</strong> Data Periode ".$process['message'];
        header("Location: ".$url."/app/periode/periode.php");
        exit(); 
}elseif(isset($_POST['updateperiode'])){
        // Data yang ingin Execution
        $data = [
            "nm_periode" => $_POST['nm_periode'],
            "status_periode" => $_POST['status_periode'],
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("periode", $data, " WHERE id_periode = ".$_POST['id_periode']."");
        $_SESSION['message'] = "<strong>Success !</strong> Data Periode ".$process['message'];
        header("Location: ".$url."/app/periode/periode.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
        //Check data masih di pakai atai tidak
        $check_mapel = QueryOnedata("SELECT * FROM mapel WHERE id_periode = ".$_GET['id_periode']."");
        if($check_mapel->num_rows > 0){
            $_SESSION['message'] = "<strong>Gagal !</strong> Data Periode tidak dapat di hapus karena masih di pakai pada mapel";
            header("Location: ".$url."/app/periode/periode.php");
            exit(); 
        }

    $process = DeleteOneData("periode", "WHERE id_periode = ".$_GET['id_periode']."");
    $_SESSION['message'] = "<strong>Success !</strong> Data Periode ".$process['message'];
    header("Location: ".$url."/app/periode/periode.php");
    exit(); 
}