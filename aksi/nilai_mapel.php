<?php
include '../config/config.php';
session_start();

if(isset($_POST['simpannilai_mapel'])){
        // Data yang ingin Execution
        $data = [
            "id_siswa" => $_POST['id_siswa'],
            "id_jadwal" => $_POST['id_jadwal'],
            "nilai" => $_POST['nilai'],
            "ket_nilai" => $_POST['ket_nilai'],
        ];    
        // Insert satu data
        $process = InsertOnedata("nilai_mapel", $data);
        $_SESSION['message'] = "Data Kelas ".$process['message'];
        header("Location: ".$url."/app/nilai_mapel/nilai_mapel.php");
        exit(); 
}elseif(isset($_POST['updatenilai_mapel'])){
        // Data yang ingin Execution
        $data = [
            "id_siswa" => $_POST['id_siswa'],
            "id_jadwal" => $_POST['id_jadwal'],
            "nilai" => $_POST['nilai'],
            "ket_nilai" => $_POST['ket_nilai'],
        ];    
        // Update data berdasarkan
        $process = UpdateOneData("nilai_mapel", $data, " WHERE id_nilai_mapel = ".$_POST['id_nilai_mapel']."");
        $_SESSION['message'] = "Data Kelas ".$process['message'];
        header("Location: ".$url."/app/nilai_mapel/nilai_mapel.php");
        exit(); 
}elseif($_GET['action'] == 'delete'){
    $process = DeleteOneData("nilai_mapel", "WHERE id_nilai_mapel = ".$_GET['id_nilai_mapel']."");
    $_SESSION['message'] = "Data Kelas ".$process['message'];
    header("Location: ".$url."/app/nilai_mapel/nilai_mapel.php");
    exit(); 
}

require 'libs/PhpSpreadsheet/src/PhpSpreadsheet/IOFactory.php';
require 'libs/PhpSpreadsheet/src/PhpSpreadsheet/Spreadsheet.php';
require 'libs/PhpSpreadsheet/src/PhpSpreadsheet/Reader/Xlsx.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


if (isset($_FILES['excel_file'])) {
    $fileName = $_FILES['excel_file']['tmp_name'];

    // Load the Excel file using PhpSpreadsheet
    $reader = new Xlsx();
    $spreadsheet = $reader->load($fileName);
    $sheet = $spreadsheet->getActiveSheet();

    // Loop through each row in the Excel file
    foreach ($sheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); // This loops through all cells, even if a cell is empty

        $cell_val = [];
        foreach ($cellIterator as $cell) {
            $cell_val[] = $cell->getValue();
        }

        // Data yang ingin Execution
        // $data = [
        //     "id_siswa" => $_POST['id_siswa'],
        //     "id_jadwal" => $_POST['id_jadwal'],
        //     "nilai" => $_POST['nilai'],
        //     "ket_nilai" => $_POST['ket_nilai'],
        // ];    

        $data = [
            "id_siswa" => $cell_val[0],
            "id_jadwal" => $cell_val[1],
            "nilai" => $cell_val[2],
            "ket_nilai" => $cell_val[2],
        ];    
        // Insert satu data
        $process = InsertOnedata("nilai_mapel", $data);
        
        /*
        // Example: Insert data into database (adjust table and columns as per your requirement)
        $sql = "INSERT INTO your_table_name (column1, column2, column3) VALUES ('$data[0]', '$data[1]', '$data[2]')";
        if (!$conn->query($sql)) {
            echo "Error: " . $conn->error;
        }
        */
    }
    $_SESSION['message'] = "Data Kelas ".$process['message'];
    header("Location: ".$url."/app/nilai_mapel/nilai_mapel.php");
    exit(); 
}