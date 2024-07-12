<?php 
include '../../config.php';
session_start();

if(isset($_POST)){
        $query = "SELECT * FROM pengguna WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";
        $login = QueryOnedata($query);
        if($login->num_rows > 0 ){
                $row = $login-> fetch_assoc();               
                $_SESSION['login'] = true;
                $_SESSION['id_pengguna'] = $row['id_pengguna'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['hakakses'] = $row['hakakses'];
                header("Location: ".$url."/app/dashboard.php");
                exit(); 
        }else{
                $_SESSION['unvalid_username'] = $_POST['username'];                
                header("Location: ".$url."/app/login.php");
                exit(); 
        }
}else{
        header("Location: ".$url."/app/dashboard.php");
        exit(); 
}
