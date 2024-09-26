<?php
require 'vendor/autoload.php';
include "koneksi.php";

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if (isset($_FILES['file']['name'])) {
    $allowed_extension = array('xls', 'xlsx');
    $file_array = explode(".", $_FILES['file']['name']);
    $file_extension = end($file_array);

    if (in_array($file_extension, $allowed_extension)) {
        $file_name = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($file_name);
        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $row) {
            $id = $row[0];
            $kode = $row[1];
            $nama_singkat_tug = $row[2];
            $nama_tug = $row[3];
            $sumber = $row[4];
            $telaahan = $row[5];
            $sprintug = $row[6];
            $tanggal_sprintug = $row[7];
            $laphastug = $row[8];
            $keterangan = $row[9];
            $check_sql = "SELECT COUNT(*) AS count FROM crud_kejaksaan WHERE id = '$id'";
            $result = mysqli_query($kon, $check_sql);
            $count = mysqli_fetch_assoc($result)['count'];

            if ($count == 0) {
                $sql = "INSERT INTO crud_kejaksaan (id, kode, nama_singkat_tug, nama_tug, sumber, telaahan, sprintug, tanggal_sprintug, laphastug, keterangan) 
                        VALUES ('$id', '$kode', '$nama_singkat_tug', '$nama_tug', '$sumber', '$telaahan', '$sprintug', '$tanggal_sprintug', '$laphastug', '$keterangan')";
                mysqli_query($kon, $sql);
            } else {
            continue;
            }
        }
        header("Location: index.php");
    } else {
        echo "Only .xls or .xlsx files are allowed.";
    }
}
?>
