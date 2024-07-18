<?php
include '../../config.php';
session_start();

if(isset($_POST['simpanuser'])){
        // Data yang ingin Execution
        $data = [
            "nm_pengguna" => $_POST['nm_pengguna'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "level" => $_POST['level'],
            "status" => 'active'
        ];    
        // Insert satu data
        $process = InsertOnedata("user", $data);
        $_SESSION['message'] = "Data Pengguna ".$process['message'];
        header("Location: ".$url."/app/user.php");
        exit(); 
}elseif(isset($_POST['updateuser'])){
        // Data yang ingin Execution
        $data = [
            "nm_pengguna" => $_POST['nm_pengguna'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "level" => $_POST['level'],
            "status" => $_POST['status']
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("user", $data, " WHERE id_user = ".$_POST['id_user']."");
        $_SESSION['message'] = "Data Pengguna ".$process['message'];
        header("Location: ".$url."/app/user.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("user", "WHERE id_user = ".$_GET['id_user']."");
    $_SESSION['message'] = "Data Pengguna ".$process['message'];
    header("Location: ".$url."/app/user.php");
    exit(); 
}