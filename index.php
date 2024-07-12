<?php 
include 'config.php';
session_start();

if(isset($_SESSION['login'])){
    // echo "HALAMAN DASHBOARD";
    header("Location: ".$url."/app/dashboard.php");
}else{
    // echo "HALAMAN LOGIN";
    header("Location: ".$url."/app/login.php");
    exit(); 
}