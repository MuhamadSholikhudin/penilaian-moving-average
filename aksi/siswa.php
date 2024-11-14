<?php
include '../config/config.php';
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
        $_SESSION['message'] = "<strong>Success !</strong> Data Siswa ".$process['message'];
        header("Location: ".$url."/app/siswa/siswa.php");
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
        $_SESSION['message'] = "<strong>Success !</strong> Data Siswa ".$process['message'];
        header("Location: ".$url."/app/siswa/siswa.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){

    //Check data masih di pakai atai tidak
    $check_nilai_mapel = QueryOnedata("SELECT * FROM nilai_mapel WHERE id_siswa = ".$_GET['id_siswa']."");
    if($check_nilai_mapel->num_rows > 0){
        $_SESSION['message'] = "<strong>Gagal !</strong>  Data Siswa tidak dapat di hapus karena masih di pakai pada nilai mapel";
        header("Location: ".$url."/app/siswa/siswa.php");
        exit(); 
    }

    $check_nilai_ekstra = QueryOnedata("SELECT * FROM nilai_ekstra WHERE id_siswa = ".$_GET['id_siswa']."");
    if($check_nilai_ekstra->num_rows > 0){
        $_SESSION['message'] = "<strong>Gagal !</strong> Data Siswa tidak dapat di hapus karena masih di pakai pada nilai ekstra";
        header("Location: ".$url."/app/siswa/siswa.php");
        exit(); 
    }

    $check_ekstra_siswa = QueryOnedata("SELECT * FROM ekstra_siswa WHERE id_siswa = ".$_GET['id_siswa']."");
    if($check_ekstra_siswa->num_rows > 0){
        $_SESSION['message'] = "<strong>Gagal !</strong> Data Siswa tidak dapat di hapus karena masih di pakai pada ekstra siswa";
        header("Location: ".$url."/app/siswa/siswa.php");
        exit(); 
    }
    $check_jadwal_siswa = QueryOnedata("SELECT * FROM jadwal_siswa WHERE id_siswa = ".$_GET['id_siswa']."");
    if($check_jadwal_siswa->num_rows > 0){
        $_SESSION['message'] = "<strong>Gagal !</strong> Data Siswa tidak dapat di hapus karena masih di pakai pada jadwal siswa";
        header("Location: ".$url."/app/siswa/siswa.php");
        exit(); 
    }
    $check_kehadiran_siswa = QueryOnedata("SELECT * FROM kehadiran_siswa WHERE id_siswa = ".$_GET['id_siswa']."");
    if($check_kehadiran_siswa->num_rows > 0){
        $_SESSION['message'] = "<strong>Gagal !</strong> Data Siswa tidak dapat di hapus karena masih di pakai pada kehadiran siswa";
        header("Location: ".$url."/app/siswa/siswa.php");
        exit(); 
    }

    $process = DeleteOneData("siswa", "WHERE id_siswa = ".$_GET['id_siswa']."");
    $_SESSION['message'] = "Data Siswa ".$process['message'];
    header("Location: ".$url."/app/siswa/siswa.php");
    exit(); 
}