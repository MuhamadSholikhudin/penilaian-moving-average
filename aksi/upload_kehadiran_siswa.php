<?php
include '../config/config.php';
use Shuchkin\SimpleXLSX;
// Include library SimpleXLSX
require_once '../simplexlsx/src/SimpleXLSX.php';

if (isset($_FILES['fileExcel'])) {
    // Cek apakah file di-upload
    if ($_FILES['fileExcel']['error'] == 0) {
        // Baca file yang di-upload
        $file = $_FILES['fileExcel']['tmp_name'];
        
        // Cek apakah file Excel valid
        if ($xlsx = SimpleXLSX::parse($file)) {
            // Ambil baris data dari file Excel
            $rows = $xlsx->rows();
            // Looping untuk setiap baris data Excel
            $no_rows = 1;
            foreach ($rows as $row) {
                if($no_rows != 1){
                $data = [
                    "id_siswa" => $row[0],
                    "tgl_masuk" => $row[1],
                    "jam_masuk" => $row[2],
                    "jam_pulang" => $row[3],
                    "status" => $row[4],
                    "keterangan" => $row[5],
                ];    
                // var_dump($data);
                // die();
                // Insert satu data
                $process = InsertOnedata("kehadiran_siswa", $data);
                }
                $no_rows++;
            }
        } else {
            $_SESSION['message'] = SimpleXLSX::parseError();
        }
    } else {
        $_SESSION['message'] = "File tidak berhasil di-upload.";
    }
}

// Tutup koneksi
// $mysqli->close();
$_SESSION['message'] = "Data Kehadiran Siswa Berhasil di Upload !";
header("Location: ".$url."/app/kehadiran_siswa/kehadiran_siswa.php");
exit();
?>
