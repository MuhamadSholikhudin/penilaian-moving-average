<?php
include '../config/config.php';
session_start();

if (isset($_POST['simpanguru'])) {

    $ekstensi_diperbolehkan = array('png', 'jpg');
    $nama_file = $_FILES['foto']['name'];
    $x = explode('.', $nama_file);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            $upload_guru =  move_uploaded_file($file_tmp, '../../foto/guru/' . $nama_file);
            if ($upload_guru) {
                // Data yang ingin Execution
                $data = [
                    "nip" => $_POST['nip'],
                    "nm_guru" => $_POST['nm_guru'],
                    "alamat_guru" => $_POST['alamat_guru'],
                    "jk_guru" => $_POST['jk_guru'],
                    "tgl_lahir" => $_POST['tgl_lahir'],
                    "no_hp_guru" => $_POST['no_hp_guru'],
                    "foto" => $nama_file,
                ];
                // Insert satu data
                $process = InsertOnedata("guru", $data);
            } else {
                $process['message'] = 'UPLOAD FOTO TIDAK BERHASIL';
            }
        } else {
            $process['message'] = 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        $process['message'] = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }

    $_SESSION['message'] = "Data Guru " . $process['message'];
    header("Location: " . $url . "/app/guru/guru.php");
    exit();
} elseif (isset($_POST['updateguru'])) {
    $nama_file = $_POST['foto_old'];
    if (isset($_FILES['foto'])) {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $nama_file = $_FILES['foto']['name'];
        $x = explode('.', $nama_file);
        $ekstensi = strtolower(end($x));
        $ukuran    = $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
                unlink('../../foto/guru/' .  $_POST['foto_old']);
                $upload_guru =  move_uploaded_file($file_tmp, '../../foto/guru/' . $nama_file);
            } else {
                $nama_file = $_POST['foto_old'];
            }
        } else {
            $nama_file = $_POST['foto_old'];
        }
    }

    // Data yang ingin Execution
    $data = [
        "nip" => $_POST['nip'],
        "nm_guru" => $_POST['nm_guru'],
        "alamat_guru" => $_POST['alamat_guru'],
        "jk_guru" => $_POST['jk_guru'],
        "tgl_lahir" => $_POST['tgl_lahir'],
        "no_hp_guru" => $_POST['no_hp_guru'],
        "foto" => $nama_file,
    ];
    // Update data berdasarkan
    $process = UpdateOneData("guru", $data, " WHERE id_guru = " . $_POST['id_guru'] . "");
    $_SESSION['message'] = "Data Guru " . $process['message'];
    header("Location: " . $url . "/app/guru/guru.php");
    exit();
} elseif ($_GET['action'] == 'delete') {
    $process = DeleteOneData("guru", "WHERE id_guru = " . $_GET['id_guru'] . "");
    $_SESSION['message'] = "Data Guru " . $process['message'];
    header("Location: " . $url . "/app/guru/guru.php");
    exit();
}
