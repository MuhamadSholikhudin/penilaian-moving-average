<?php
include '../../config.php';
session_start();

if(isset($_POST['simpanuser'])){
        // Data yang ingin Execution
        $data = [
            "name" => $_POST['name'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "hakakses" => $_POST['hakakses'],
            "status" => 'active'
        ];    
        // Insert satu data
        $process = InsertOnedata("pengguna", $data);
        $_SESSION['message'] = "Data Pengguna ".$process['message'];
        header("Location: ".$url."/app/pengguna.php");
        exit(); 
}elseif(isset($_POST['updateuser'])){
        // Data yang ingin Execution
        $data = [
            "name" => $_POST['name'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "hakakses" => $_POST['hakakses'],
            "status" => $_POST['status']
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("pengguna", $data, " WHERE id_pengguna = ".$_POST['id_pengguna']."");
        $_SESSION['message'] = "Data Pengguna ".$process['message'];
        header("Location: ".$url."/app/pengguna.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("pengguna", "WHERE id_pengguna = ".$_GET['id_pengguna']."");
    $_SESSION['message'] = "Data Pengguna ".$process['message'];
    header("Location: ".$url."/app/pengguna.php");
    exit(); 
}