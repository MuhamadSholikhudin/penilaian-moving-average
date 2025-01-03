<?php
function Url_web(){
    $xplode = explode("/", $_SERVER['REQUEST_URI']);
    return $xplode[1];
}
$defaul_uri = "/".Url_web();
$url = "http://".$_SERVER['SERVER_NAME']."".$defaul_uri;
$lokasi_foto = $_SERVER['DOCUMENT_ROOT'].$defaul_uri.'/foto';
$YMDhis = date('YMDhis');
function DB(){
    return ["localhost", "root", "", "penilaian_ma"];
}
function runQuery($sql) {
    try {
        // Membuka koneksi ke database
        $conn = mysqli_connect(DB()[0], DB()[1], DB()[2], DB()[3]);
        // Menjalankan kueri SQL
        $result = mysqli_query($conn, $sql);
        // Menutup koneksi ke database
        mysqli_close($conn);
        return $result;
    } catch (Exception $e) {
        // Tangani pengecualian
        // Di sini Anda dapat menampilkan pesan kesalahan atau melakukan penanganan lainnya
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

function QueryManyData($sql){
    $conn = new mysqli(DB()[0], DB()[1], DB()[2], DB()[3]);
    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
    // Menutup koneksi database
    $conn->close();
    return $result;
}

function QueryOnedata($sql){
    $conn = new mysqli(DB()[0], DB()[1], DB()[2], DB()[3]);
    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    // Query SQL untuk mengambil data dari tabel "users"
    $result = $conn->query($sql);
    // Menutup koneksi database
    $conn->close();
    // return $row = $result->fetch_assoc();
    return $result;
}

function InsertOnedata($tabel, $data){
    $conn = new mysqli(DB()[0], DB()[1], DB()[2], DB()[3]);
    // Memeriksa koneksi
    if ($conn->connect_error) {
        return ["code" => 400, "message" => $conn->connect_error];
    }
    // Menggabungkan kunci dan nilai menjadi string untuk digunakan dalam perintah SQL
    $keys = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    // Query SQL untuk menambahkan data ke dalam tabel "users"
    $sql = "INSERT INTO $tabel ($keys) VALUES ($values)";
    if ($conn->query($sql) === TRUE) {
        echo "Berhasil ditambahkan.";
        return ["code" => 200, "message" =>  "Berhasil di Tambahkan"];
    } else {
        return ["code" => 400, "message" =>  $conn->error];
    }
    // Menutup koneksi database
    $conn->close();
}


function UpdateOneData($table, $data, $where){
    $conn = new mysqli(DB()[0], DB()[1], DB()[2], DB()[3]);
    // Memeriksa koneksi
    if ($conn->connect_error) {
        return ["code" => 400, "message" => $conn->connect_error];
    }
    // Membuat string untuk perintah UPDATE
    $updateData = "";
    foreach ($data as $key => $value) {
        $updateData .= "$key='$value', ";
    }
    $updateData = rtrim($updateData, ", "); // Menghapus koma terakhir
    // Query SQL untuk menambahkan data ke dalam tabel "users"
    $sql = "UPDATE $table SET $updateData $where";
    if ($conn->query($sql) === TRUE) {
        return ["code" => 200, "message" =>  "Berhasil di Update"];
    } else {
        return ["code" => 400, "message" =>  $conn->error];
    }
    // Menutup koneksi database
    $conn->close();
}

function DeleteOneData($table, $where){
    $conn = new mysqli(DB()[0], DB()[1], DB()[2], DB()[3]);
    // Memeriksa koneksi
    if ($conn->connect_error) {
        return ["code" => 400, "message" => $conn->connect_error];
    }
    // Query SQL untuk menambahkan data ke dalam tabel "users"
    $sql = "DELETE FROM $table $where";
    if ($conn->query($sql) === TRUE) {
        return ["code" => 200, "message" =>  "Berhasil di Hapus"];
    } else {
        return ["code" => 400, "message" =>  $conn->error];
    }
    // Menutup koneksi database
    $conn->close();
}

function Sub_menu_active($sub_menu){                
    $string = str_replace(Url_web()."/app/", "", $_SERVER['REQUEST_URI']);
    $expl = explode("/", $string);
    $output = "";
    if($expl[1] == $sub_menu){
        $output = "active";
    }
    return $output;
}

function Menu_active($menus){ //$menus array
    $string = str_replace(Url_web()."/app/", "", $_SERVER['REQUEST_URI']);
    $expl = explode("/", $string);
    $result = "";
    for($x = 0 ; $x < count($menus); $x ++){
        if ($expl[1] == $menus[$x]) {
            $result = "show";
        }
    }
    return $result;
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return $hasil;
}

