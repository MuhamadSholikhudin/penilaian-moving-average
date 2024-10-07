<?php
// Include library SimpleXLSX
include '../config/config.php';
require_once '../SimpleXLSX/src/SimpleXLSX.php';
 
/*
// Koneksi ke database MySQL
$host = 'localhost';
$dbname = 'nama_database';
$username = 'root';
$password = '';
$mysqli = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
*/

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
            foreach ($rows as $row) {
                $data = [
                    "id_siswa" => $row[0],
                    "id_jadwal" => $row[1],
                    "nilai" => $row[2],
                    "ket_nilai" => $row[3],
                ];    
                echo "<br>";
                var_dump($data);
                // Insert satu data
                //$process = InsertOnedata("nilai_mapel", $data);
                // Asumsi kolom Excel [0 => 'id', 1 => 'name', 2 => 'email']
                /*

                $id = $mysqli->real_escape_string($row[0]);
                $name = $mysqli->real_escape_string($row[1]);
                $email = $mysqli->real_escape_string($row[2]);                
                // Siapkan query insert data ke MySQL
                $sql = "INSERT INTO users (id, name, email) VALUES ('$id', '$name', '$email')";
                // Eksekusi query
                if ($mysqli->query($sql) === TRUE) {
                    echo "Data berhasil di-insert: ID = $id, Name = $name, Email = $email<br>";
                } else {
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                }
                */
            }
        } else {
            echo SimpleXLSX::parseError();
        }
    } else {
        echo "File tidak berhasil di-upload.";
    }
}

// Tutup koneksi
// $mysqli->close();
$_SESSION['message'] = "Data Nilai Mapel Berhasil di Upload !";
header("Location: ".$url."/app/nilai_mapel/nilai_mapel.php");
exit();
?>
